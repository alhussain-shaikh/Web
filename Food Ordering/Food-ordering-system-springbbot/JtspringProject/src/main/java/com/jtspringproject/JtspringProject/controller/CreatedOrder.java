package com.jtspringproject.JtspringProject.controller;

import lombok.Data;

import java.net.URI;

@Data
public class CreatedOrder {
    private final String orderId;
    private final URI approvalLink;

  

	public CreatedOrder(String id, URI create) {
		this.orderId = id;
		this.approvalLink= create;
	}



	public URI getApprovalLink() {
        return this.approvalLink;
    }
}
