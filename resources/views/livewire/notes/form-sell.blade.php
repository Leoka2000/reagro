<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Note;
use App\Models\User;
use WireUi\View\Components\Input;
use WireUi\Traits\Actions;

new class extends Component {
    use Actions;
    use WithFileUploads;

    public $companyName;
    public $productName;

    public $typeofFrete; //N UTILIZAREMOS, será null
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
    public $acceptTerms;

    public $companyImage = [];

    public function submit()
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

            'acceptTerms' => ['required', 'boolean'],
        ]);

        $images = [];
        foreach ($this->companyImage as $image) {
            $imagePath = $image->store('company_images', 'public'); // Store images in storage/app/public/company_images
            $images[] = $imagePath; // Store the image path in the array
        }

        auth()
            ->user()
            ->notes()
            ->create([
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
                'accept_terms' => $this->acceptTerms,
            ]);

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Anúncio publicado!',
            'description' => 'Agora, você poderá visualizar, editar, ou deletar o seu anúncio em nossa plataforma',
        ]);
    }
}; ?>
{{-- 'residue_type' => $this->residueType, --}}
<div>
    <x-card title="Descreva abaixo os detalhes do produto que pretendes vender.">
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
            <x-input icon='currency-dollar' label="Valor total da sua oferta (apenas números, use pontos, não vírgulas!)" placeholder="200.00"
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
                    <x-textarea label="Descrição do anúncio" wire:model.defer="companyDescription" />
                    <x-toggle label="Eu li e aceito os termos de serviço" class='bb-20'
                        wire:model.defer="acceptTerms" />
                </div>




            </div>

            <x-slot name="footer" class='mt-24'>
                <div class="flex tp-5 gap-x-3">

                    <x-button wire:click="submit" label="Criar" icon='plus' spinner="submit" primary />
                </div>
            </x-slot>
    </x-card>
</div>

{{--     'price' => $this->companyPrice, 'typeof_frete' => $this->typeofFrete,   'companyPrice' => ['required', 'integer'], --}}
{{--       'typeofFrete' => ['required', 'string'],
                'companyPrice' => ['required', 'integer'], --}}
