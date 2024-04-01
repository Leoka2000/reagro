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
    public $deliveryAddress; // rua
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

    public function cities()
{
    return [
        'Porto Alegre',
        'Caxias do Sul',
        'Pelotas',
        'Canoas',
        'Santa Maria',
        'Gravataí',
        'Viamão',
        'Novo Hamburgo',
        'São Leopoldo',
        'Rio Grande',
        'Alvorada',
        'Passo Fundo',
        'Sapucaia do Sul',
        'Uruguaiana',
        'Santa Cruz do Sul',
        'Cachoeirinha',
        'Bagé',
        'Bento Gonçalves',
        'Santa Rosa',
        'Santa Maria',
        'Camaquã',
        'Esteio',
        'Santana do Livramento',
        'São Gabriel',
        'Ijuí',
        'Alegrete',
        'Tramandaí',
        'Capão da Canoa',
        'São Lourenço do Sul',
        'Vacaria',
        'Cachoeira do Sul',
        'Guaíba',
        'Santo Ângelo',
        'Osório',
        'Farroupilha',
        'Torres',
        'Erechim',
        'Canela',
        'São Borja',
        'Montenegro',
        'Taquara',
        'Carazinho',
        'Lajeado',
        'São Sebastião do Caí',
        'Rio Pardo',
        'Santiago',
        'Venâncio Aires',
        'São Francisco de Paula',
        'São Jerônimo',
        'Igrejinha',
        'Tapejara',
        'São José do Norte',
        'Garibaldi',
        'São Luiz Gonzaga',
        'Dom Pedrito',
        'Tapes',
        'Encantado',
        'Sobradinho',
        'Rolante',
        'Arroio do Meio',
        'Marau',
        'Gramado',
        'Cidreira',
        'Constantina',
        'Teutônia',
        'Charqueadas',
        'São Sepé',
        'Butiá',
        'Veranópolis',
        'Carlos Barbosa',
        'Espumoso',
        'Ibirubá',
        'Arroio Grande',
        'Barra do Ribeiro',
        'São Borja',
        'São Marcos',
        'São Pedro do Sul',
        'São José dos Ausentes',
        'São Valentim do Sul',
        'Cacequi',
        'São Vicente do Sul',
        'São João do Polêsine',
        'São Francisco de Assis',
        'São Lourenço do Sul',
        'São Gabriel',
        'São Miguel das Missões',
        'São Pedro da Serra',
        'São Valentim',
        'Sapiranga',
        'Sapucaia',
        'Sarandi',
        'Seberi',
        'Sede Nova',
        'Serafina Corrêa',
        'Silveira Martins',
        'Sinimbu',
        'Sobradinho',
        'Soledade',
        'Tabaí',
        'Tapejara',
        'Tapes',
        'Taquara',
        'Taquari',
        'Teutônia',
        'Tio Hugo',
        'Tramandaí',
        'Travesseiro',
        'Três de Maio',
        'Três Palmeiras',
        'Três Passos',
        'Triunfo',
        'Tucunduva',
        'Tupanciretã',
        'Tupandi',
        'Turvo',
        'Ubiretama',
        'União da Serra',
        'Uruguaiana',
        'Vacaria',
        'Vale do Sol',
        'Vale Real',
        'Vale Verde',
        'Vanini',
        'Venâncio Aires',
        'Vera Cruz',
        'Veranópolis',
        'Vespasiano Correa',
        'Viadutos',
        'Viamão',
        'Vicente Dutra',
        'Victor Graeff',
        'Vila Flores',
        'Vila Lângaro',
        'Vila Maria',
        'Vila Nova do Sul',
        'Vista Alegre',
        'Vista Alegre do Prata',
        'Vista Gaúcha',
        'Vitória das Missões',
        'Westfália',
        'Xangri-lá'
    ];
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
            <x-input icon='currency-dollar'
                label="Valor total da sua oferta (apenas números, use pontos, não vírgulas!)" placeholder="200.00"
                wire:model.defer="companyPrice" />
            <x-input multiple type="file" wire:model="companyImage"
                label='Fotos que deseja mostrar ao cliente. (suas fotos não podem ser maiores que 1,5MB)'
                placeholder="Upload de fotos" />




            <x-input label="Rua" placeholder=" Rua Montserrat 12" wire:model.defer="deliveryAddress" /> <x-input
                label="Quantidade total do produto" placeholder="2 kilos de .... " wire:model.defer="productQuantity" />
            <div class="col-span-1 sm:col-span-2">

                <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6">
                    <x-select label="Cidade" wire:model.defer="addressCity" :options="$this->cities()" class='mb-4' placeholder="Porto Alegre" />

                 
                    <x-native-select label="Estado" :options="['Rio Grande do Sul']" class='mb-4' wire:model.defer="companyState" />
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
