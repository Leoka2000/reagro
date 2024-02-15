<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

new #[Layout('layouts.app')] class extends Component {
    use WithFileUploads;
    use Actions;

    public Note $note;
    public $companyName;
    public $productName;
    //public $typeofFrete; //N UTILIZAREMOS, será null
    public $companyEmail;
    public $companyPhone;
    public $companyState;
    public $deliveryAddress;
    public $companyPostalCode;
    public $productQuantity;
    public $companyPrice;
    public $residueType;
    public $pricePerUnit;
    public $addressCity;
    public $companyDescription;
    public $companyImage = [];
  

    public function mount(Note $note)
    {
        $this->authorize('update', $note);
        $this->fill($note);
        $this->companyName = $note->company_name;
        $this->productName = $note->product_name;
       // $this->typeofFrete = $note->typeof_frete;
        $this->companyEmail = $note->company_email;
        $this->companyPhone = $note->company_phone;
        $this->companyState = $note->company_state;
        $this->deliveryAddress = $note->delivery_address;
        $this->companyPostalCode = $note->postal_code;
        $this->productQuantity = $note->product_quantity;
        $this->companyPrice = $note->price;
        $this->residueType = $note->residue_type;
        $this->$pricePerUnit = $note->price_perunit;
        $this->$addressCity = $note->address_city;
        $this->$companyDescription = $note->description;
        //n daremos mount na imagen
  
    }


     public function saveNote()
    {
        $validated = $this->validate([
          'companyName' => ['required', 'string', 'min:3'],
            'companyEmail' => ['required', 'email'],
            'productName' => ['required', 'string', 'min:3'],
            'productQuantity' => ['required', 'string'],
            'companyState' => ['required', 'string'],
            'addressCity' => ['required', 'string'],
            'companyPostalCode' => ['required', 'string'],
            'companyPrice' => ['required', 'numeric', 'between:0,9999.99'],
            'companyPhone' => ['required', 'numeric'],
            'deliveryAddress' => ['required', 'string', 'min:5'], //street,
            'companyImage.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:102400',
            'pricePerUnit' => ['string', 'min:2'],
            'companyDescription' => ['required', 'string', 'min:30'],
            'residueType' => ['required', 'string', 'min:3'],
            // sem accept terms
        ]);
        
        if ($this->$companyImage) {
            $validated = $this->validate([
         'companyImage.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:102400',
            ]);
        }
    
        
        $this->note->update([
             'company_name' => $this->companyName,
                'product_name' => $this->productName,
                'company_email' => $this->companyEmail,
                'product_quantity' => $this->productQuantity,
                'company_state' => $this->companyState,
                'address_city' => $this->addressCity,
                'postal_code' => $this->companyPostalCode,
                'company_phone' => $this->companyPhone,
                'delivery_address' => $this->deliveryAddress,
                'image' => implode(',', $images),
                'price_perunit' => $this->pricePerUnit,
                'description' => $this->companyDescription,
                'residue_type' => $this->residueType,
                'price' => $this->companyPrice,
             
        ]);

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Profile edited!',
        ]);
    }
}; ?>


<div>

</div>
