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
        $this->pricePerUnit = $note->price_perunit;
        $this->addressCity = $note->address_city;
        $this->companyDescription = $note->description;
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

            'pricePerUnit' => ['string', 'min:2'],
            'companyDescription' => ['required', 'string', 'min:30'],
            'residueType' => ['required', 'string', 'min:3'],
            // sem accept terms
        ]);

        if ($this->companyImage) {
            $validated = $this->validate([
                'companyImage.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:102400',
            ]);

            $images = [];
            foreach ($this->companyImage as $image) {
                $imagePath = $image->store('company_images', 'public');
                $images[] = $imagePath;
            }

            $this->note->update([
                'image' => implode(',', $images),
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

            'price_perunit' => $this->pricePerUnit,
            'description' => $this->companyDescription,
            'residue_type' => $this->residueType,
            'price' => $this->companyPrice,
        ]);

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Anúncio salvo!',
        ]);
    }
}; ?>


<section class='px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8'>
    <x-button icon="arrow-left" class="mb-8" href="{{ route('notes.buy-index') }}"> Voltar</x-button>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Editar anúncio
        </h2>
    </x-slot>
    <x-card title="Descreva abaixo os detalhes do produto que pretende vender.">
        <x-errors class="mb-4" />

        <div class="grid grid-cols-1 gap-6 px-2 sm:grid-cols-2">
            <x-input icon='user' label="Nome da Empresa" placeholder="Transer Wise LTda"
                wire:model.defer="companyName" />
            <x-input icon='mail' label="Email para contato" placeholder="example@gmail.com"
                wire:model.defer="companyEmail" />

            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-7 sm:gap-5">
                <div class="col-span-1 mb-4 sm:col-span-4">
                    <x-input icon='beaker' label="Nome do produto sendo vendido" placeholder="Cloridrato hidratado"
                        wire:model.defer="productName" />
                </div>

                <div class="col-span-1 sm:col-span-3">
                    <x-input icon='phone' label="Whatsapp para contato" placeholder="+55 51 99875531"
                        wire:model.defer="companyPhone" />

                </div>
            </div>

            <x-native-select label="Tipo de produto" placeholder="Sólido" :options="['Sólido', 'Líquido', 'Semi-sólido']" wire:model="residueType" />

            {{--    :options="$this->countries()" --}}

            <x-native-select class='z-10' label="Tipo de unidade" placeholder="Select an option"
                wire:model.defer="pricePerUnit" :options="['Litros', 'Mililitros', 'Gramas', 'Kilos']" />
            <x-input icon='currency-dollar' label="Valor total da sua oferta (apenas números!)" placeholder="200.00"
                wire:model.defer="companyPrice" />
            <x-input multiple type="file" wire:model="companyImage"
                label='Fotos que deseja mostrar ao cliente. (suas fotos não podem ser maiores que 1,5MB)'
                placeholder="Upload de fotos" />




            <x-input label="Rua" placeholder=" Rua Montserrat 12" wire:model.defer="deliveryAddress" /> <x-input
                label="Quantidade total do produto" placeholder="2 kilos de .... " wire:model.defer="productQuantity" />
            <div class="col-span-1 sm:col-span-2">

                <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6">
                    <x-input label="Cidade" class='mb-4' placeholder="Porto Alegre" wire:model.defer="addressCity" />
                    <x-input label="Estado" class='mb-4' placeholder="Rio Grande do Sul"
                        wire:model.defer="companyState" />
                    <x-input label="Código postal para entrega (CEP)" placeholder="90215-043"
                        wire:model.defer="companyPostalCode" />
                </div>
                <div class="flex flex-col gap-6 my-6">
                    <x-textarea label="Detalhes do anúncio" wire:model.defer="companyDescription" />

                </div>




            </div>

            <x-slot name="footer" class='mt-24'>
                <div class="flex items-center justify-end tp-5 gap-x-3">

                    <x-button wire:click="saveNote" label="Salvar" spinner='saveNote' primary />
                </div>
            </x-slot>
    </x-card>
</section>
