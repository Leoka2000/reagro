<div>
    @if ($showImageModal)
        <x-modal wire:model.defer="showImageModal">
            <x-card title="Image Carousel">
                <div x-data="{
                    images: @json($images),
                    currentImage: @entangle('currentImage'),
                    prev() {
                        const index = this.images.indexOf(this.currentImage);
                        if (index > 0) {
                            this.currentImage = this.images[index - 1];
                        }
                    },
                    next() {
                        const index = this.images.indexOf(this.currentImage);
                        if (index < this.images.length - 1) {
                            this.currentImage = this.images[index + 1];
                        }
                    }
                }" class="relative">
                    <div class="flex justify-center">
                        <img :src="currentImage" class="w-full h-auto" alt="Current Image">
                    </div>
                    <button @click="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-600 text-white p-2 rounded-full">
                        &lt;
                    </button>
                    <button @click="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-600 text-white p-2 rounded-full">
                        &gt;
                    </button>
                </div>
                <x-slot name="footer">
                    <div class="flex justify-end">
                        <x-button flat label="Close" wire:click="closeModal" />
                    </div>
                </x-slot>
            </x-card>
        </x-modal>
    @endif
</div>
