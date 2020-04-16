
<ul class="font-semibold">
    <li class="flex px-4 py-2 mb-1 rounded-full hover:bg-gray-200 hover:text-blue-500" :class="{ 'bg-gray-200': tab === 'allQuestion' }" x-on:click="tab = 'allQuestion'">
        <span class="bg-blue-500 rounded-full text-white px-1">0</span>
        <span class="ml-3"> Questions</span>
    </li>
    <li class="flex px-4 py-2 mb-1 rounded-full hover:bg-gray-200 hover:text-blue-500" :class="{ 'bg-gray-200': tab === 'myQuestion' }"x-on:click="tab = 'myQuestion'">
        <span class="bg-blue-500 rounded-full text-white px-1">0</span>
        <span class="ml-3"> My Question</span>
    </li>
</ul>