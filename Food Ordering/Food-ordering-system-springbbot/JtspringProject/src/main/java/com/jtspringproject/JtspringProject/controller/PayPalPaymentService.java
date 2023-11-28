package com.jtspringproject.JtspringProject.controller;


import com.paypal.core.PayPalEnvironment;
import com.paypal.core.PayPalHttpClient;
import com.paypal.http.HttpResponse;
import com.paypal.orders.*;
import lombok.SneakyThrows;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import java.io.IOException;
import java.net.URI;
import java.util.Arrays;
import java.util.NoSuchElementException;

@Service
@Slf4j
public class PayPalPaymentService implements PaymentService{

    private final String APPROVE_LINK_REL = "approve";

    private final PayPalHttpClient payPalHttpClient;

    public PayPalPaymentService(@Value("${paypal.client.id}") String clientId,
                                @Value("${paypal.client.secret}") String clientSecret) {
        payPalHttpClient = new PayPalHttpClient(new PayPalEnvironment.Sandbox(clientId, clientSecret));
    }

    @Override
    @SneakyThrows
    public CreatedOrder createOrder(Double totalAmount, URI returnUrl) {
        final OrderRequest orderRequest = createOrderRequest(totalAmount, returnUrl);
        final OrdersCreateRequest ordersCreateRequest = new OrdersCreateRequest().requestBody(orderRequest);
        HttpResponse<Order> orderHttpResponse;
        CreatedOrder co = null;
		try {
			orderHttpResponse = payPalHttpClient.execute(ordersCreateRequest);
			final Order order = orderHttpResponse.result();
	        LinkDescription approveUri = extractApprovalLink(order);
	        co= new CreatedOrder(order.id(),URI.create(approveUri.href()));
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return co;
        
    }

    @Override
    @SneakyThrows
    public void captureOrder(String orderId) {
        final OrdersCaptureRequest ordersCaptureRequest = new OrdersCaptureRequest(orderId);
        HttpResponse<Order> httpResponse;
		try {
			httpResponse = payPalHttpClient.execute(ordersCaptureRequest);
			System.out.printf("Order Capture Status: {}",httpResponse.result().status());
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
        
    }

    private OrderRequest createOrderRequest(Double totalAmount, URI returnUrl) {
        final OrderRequest orderRequest = new OrderRequest();
        setCheckoutIntent(orderRequest);
        setPurchaseUnits(totalAmount, orderRequest);
        setApplicationContext(returnUrl, orderRequest);
        return orderRequest;
    }

    private OrderRequest setApplicationContext(URI returnUrl, OrderRequest orderRequest) {
        return orderRequest.applicationContext(new ApplicationContext().returnUrl(returnUrl.toString()));
    }

    private void setPurchaseUnits(Double totalAmount, OrderRequest orderRequest) {
        final PurchaseUnitRequest purchaseUnitRequest = new PurchaseUnitRequest()
                .amountWithBreakdown(new AmountWithBreakdown().currencyCode("USD").value(totalAmount.toString()));
        orderRequest.purchaseUnits(Arrays.asList(purchaseUnitRequest));
    }

    private void setCheckoutIntent(OrderRequest orderRequest) {
        orderRequest.checkoutPaymentIntent("CAPTURE");
    }

    private LinkDescription extractApprovalLink(Order order) {
        LinkDescription approveUri = order.links().stream()
                .filter(link -> APPROVE_LINK_REL.equals(link.rel()))
                .findFirst()
                .orElseThrow(NoSuchElementException::new);
        return approveUri;
    }
}