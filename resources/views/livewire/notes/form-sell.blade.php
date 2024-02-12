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
    public $productQuantity;
    public $typeofFrete; //N UTILIZAREMOS
    public $companyEmail;
    public $companyPhone;
    public $companyState;
    public $deliveryAddress;
    public $companyPostalCode;
    public $companyPrice; //N USAREMOS POR ENQUANTO TBM
    public $residueType;
    public $pricePerUnit;
    public $addressCity;
    public $companyDescription;
    public $acceptTerms;

    public $companyImage;

    public function submit()
    {
        $validated = $this->validate([
            'companyName' => ['required', 'string', 'min:3'],
            'companyEmail' => ['required', 'email'],
            'productName' => ['required', 'string', 'min:3'],
            'productQuantity' => ['required', 'numeric'],

            'companyState' => ['required', 'string'],
            'addressCity' => ['required', 'string'],
            'companyPostalCode' => ['required', 'string'],

            'companyPhone' => ['required', 'numeric'],
            'deliveryAddress' => ['required', 'string', 'min:5'], //street,
            'companyImage' => 'file|mimes:png,jpg,pdf|max:102400',
            'pricePerUnit' => ['string', 'min:2'],
            'companyDescription' => ['required', 'string', 'min:30'],
            'residueType' => ['required', 'string', 'min:3'],
            'companyImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'acceptTerms' => ['required', 'boolean'],
        ]);

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

                'price_perunit' => $this->pricePerUnit,
                'description' => $this->companyDescription,
                'residue_type' => $this->residueType,
                'image' => $this->companyImage->store('storage', 'public'),
                'price' => $this->companyPrice,
                'accept_terms' => $this->acceptTerms,
            ]);

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Anúncio publicado!!',
            'description' => 'Agora, voce poderá vizualizar, editar, ou deletar o seu anúncio em nossa plataforma',
        ]);
    }
}; ?>
{{-- 'residue_type' => $this->residueType, --}}
<div>
    <x-card title="Descreva-nos abaixo detalhes do produte que prendes vender">
        <x-errors class="mb-4" />

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <x-input label="Nome da Empresa" placeholder="Transer Wise LTda" wire:model.defer="companyName" />
            <x-input icon='mail' label="Email para contato" placeholder="example@gmail.com"
                wire:model.defer="companyEmail" />

            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-7 sm:gap-5">
                <div class="col-span-1 sm:col-span-4">
                    <x-input label="Nome do produto sendo vendido" placeholder="Cloridrato hidratado"
                        wire:model.defer="productName" />
                </div>

                <div class="col-span-1 sm:col-span-3">
                    <x-input label="Whatsapp para contato (manteremos este dado em sigilo)"
                        placeholder="+55 51 99875531" wire:model.defer="companyPhone" />

                </div>
            </div>

            <x-native-select label="Selecione o tipo de produto" placeholder="Sólido" :options="['Sólido', 'Líquido', 'Semi-sólido']"
                wire:model="residueType" />

            {{--    :options="$this->countries()" --}}

            <x-native-select class='z-10' label="Selecione o tipo de unidade" placeholder="Select an option"
                wire:model.defer="pricePerUnit" :options="['Litro', 'Mililitros', 'Grama', 'Kilo']" />
            <x-input label="Selecione o preço por unidade (apenas números)" placeholder="200,00" wire:model.defer="productQuantity" />
            <x-input type="file" wire:model="companyImage" label='Fotos que desejas mostrar o cliente'
                placeholder="Upload de fotos" />


              
       
            <x-input label="Rua" placeholder="" wire:model.defer="deliveryAddress" />
            <div class="col-span-1 sm:col-span-2">

                <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6">
                    <x-input label="Cidade" placeholder="Porto Alegre" wire:model.defer="addressCity" />
                    <x-input label="Estado" placeholder="Rio Grande do Sul" wire:model.defer="companyState" />
                    <x-input label="Código postal (CEP) para entrega" placeholder=""
                        wire:model.defer="companyPostalCode" />
                </div>
                <div class="col-span-1 my-2 sm:col-span-2">
                    <x-textarea label="Detalhes do anúncio" placeholder="" wire:model.defer="companyDescription" />
                </div>



                <x-toggle label="Eu li e aceito os termos de service" class='bb-20' wire:model.defer="acceptTerms" />
            </div>

            <x-slot name="footer" class='mt-24'>
                <div class="flex items-center justify-end tp-5 gap-x-3">

                    <x-button wire:click="submit" label="Save" spinner="save" primary />
                </div>
            </x-slot>
    </x-card>
</div>

{{--     'price' => $this->companyPrice, 'typeof_frete' => $this->typeofFrete,   'companyPrice' => ['required', 'integer'], --}}
{{--       'typeofFrete' => ['required', 'string'],
                'companyPrice' => ['required', 'integer'], --}}
