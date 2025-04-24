<div class="">
    <div class="flex flex-col space-y-4">
        <input type="text"
               wire:model="windowId"
               class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
               placeholder="ID (leave empty for random)"/>

        <div class="flex space-x-4 items-center">
            <input type="text"
                   wire:model="title"
                   class="flex-1 transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
                   placeholder="Title"/>

            <button
                wire:click="setTitle"
                class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
                Update Title
            </button>
        </div>

        <label class="flex items-center space-x-2">
            <input type="checkbox"
                   wire:model="showDevTools"
                   class="transition duration-100 rounded-sm border border-gray-800 focus:ring-0"/>
            <span class="ml-2 mt-0 text-gray-500 inline-block">Show DevTools</span>
        </label>

        <label class="flex items-center space-x-2">
            <input type="checkbox"
                   wire:model="alwaysOnTop"
                   class="transition duration-100 rounded-sm border border-gray-800 focus:ring-0"/>
            <span class="ml-2 mt-0 text-gray-500 inline-block">Always on Top</span>
        </label>

        <button
            wire:click="open"
            class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
            Open Window
        </button>

        <button
            wire:click="toggleDevTools"
            class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
            Toggle DevTools
        </button>

        <button
            wire:click="toggleClosable"
            class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
            Toggle Closable
        </button>
    </div>
</div>
