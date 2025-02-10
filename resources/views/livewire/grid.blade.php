<div class="grid grid-cols-1 md:grid-cols-[1fr_280px] gap-4">
    <div class="flex items-center justify-center bg-slate-50 rounded-md">
        {!! $svg !!}
    </div>
    <form class="py-4 mr-6 rounded-md">
        <div class="grid grid-cols-3 gap-2">
            <label for="width" class="flex items-center justify-end">Width:</label>
            <div class="flex space-x-2 col-span-2">
                <div class="flex items-center border border-gray-700 bg-gray-700 rounded text-white focus-within:border-sky-500">
                    <input wire:model="widthFeet" type="text" name="widthFeet" class="p-2 w-full rounded-l focus:outline-none">
                    <span class="bg-gray-500 p-2 rounded-r">ft</span>
                </div>
                <div class="flex items-center border border-gray-700 bg-gray-700 rounded text-white focus-within:border-sky-500">
                    <input wire:model="widthInches" type="text" name="widthInches" class="p-2 w-full rounded-l focus:outline-none">
                    <span class="bg-gray-500 p-2 rounded-r">in</span>
                </div>
            </div>
            <p class="text-red-500 text-sm mt-1 col-span-3">@error('totalWidth') {{ $message }} @enderror</p>

            <label for="length" class="flex items-center justify-end">Length:</label>
            <div class="flex space-x-2 col-span-2">
                <div class="flex items-center border border-gray-700 bg-gray-700 rounded text-white focus-within:border-sky-500">
                    <input wire:model="lengthFeet" type="text" name="lengthFeet" class="p-2 w-full rounded-l focus:outline-none">
                    <span class="bg-gray-500 p-2 rounded-r">ft</span>
                </div>
                <div class="flex items-center border border-gray-700 bg-gray-700 rounded text-white focus-within:border-sky-500">
                    <input wire:model="lengthInches" type="text" name="lengthInches" class="p-2 w-full rounded-l focus:outline-none">
                    <span class="bg-gray-500 p-2 rounded-r">in</span>
                </div>
            </div>
            <p class="text-red-500 text-sm mt-1 col-span-3">@error('totalLength') {{ $message }} @enderror</p>

            <label for="spacing" class="flex items-center justify-end">Spacing:</label>
            <div class="flex space-x-2 col-span-2">
                <div class="flex items-center border border-gray-700 bg-gray-700 rounded text-white focus-within:border-sky-500">
                    <input wire:model="spacing" type="text" name="spacing" class="p-2 w-full rounded-l focus:outline-none">
                    <span class="bg-gray-500 p-2 rounded-r">in</span>
                </div>
            </div>
            <p class="text-red-500 text-sm mt-1 col-span-3">@error('spacing') {{ $message }} @enderror</p>

            <div class="col-span-3 text-center">
                <button wire:click.prevent="calculate()" class="cursor-pointer text-white font-medium rounded-md p-2 bg-sky-600">
                    Calculate
                </button>
            </div>
        </div>
    </form>
</div>
