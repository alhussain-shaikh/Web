package com.jtspringproject.JtspringProject.controller;


import java.net.URI;

public interface PaymentService {

    CreatedOrder createOrder(Double totalAmount, URI returnUrl);

    void captureOrder(String orderId);
}