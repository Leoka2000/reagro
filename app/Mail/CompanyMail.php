<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompanyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $orderStatus;
    public $companyEmail;
    public $productQuantity;
    public $productName;
    public $companyState;
    public $companyCity;
    public $companyPostalCode;
    public $deliveryAddress;
    public $residueType;
    public $companyName;
   


    public function __construct($orderStatus, $companyEmail, $deliveryAddress, $productQuantity, $productName, $companyState, $companyCity, $companyPostalCode, $residueType, $companyName)
    {
        $this->orderStatus = $orderStatus;
        $this->companyEmail = $companyEmail;
        $this->deliveryAddress = $deliveryAddress;
        $this->productQuantity = $productQuantity;
        $this->productName = $productName;
        $this->companyState = $companyState;
        $this->companyCity = $companyCity;
        $this->companyPostalCode = $companyPostalCode;
        $this->residueType = $residueType;
        $this->companyName = $companyName;
      
    }
    
 /*ú
 $deliveryAddress, $productQuantity, $productName, $companyEmail, $companyState, $companyCity, $companyPostalCode, $residueType, $companyName
       
     */
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Company Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'livewire.view-email.email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
