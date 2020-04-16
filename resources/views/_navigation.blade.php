
<ul class="font-semibold">
    <li class="px-4 py-2 mb-1 rounded-lg hover:bg-white hover:text-blue-500" :class="{ 'bg-gray-200': tab === 'allQuestion' }" x-on:click="tab = 'allQuestion'">
        <a href="">
            <span class="bg-blue-500 rounded-lg text-white px-1">0</span>
            <span class="ml-3" > Home</span>
        </a>
    </li>
    <li class="px-4 py-2 mb-1 rounded-lg hover:bg-white hover:text-blue-500" :class="{ 'bg-gray-200': tab === 'allQuestion' }" x-on:click="tab = 'allQuestion'">
        <a href="">
            <span class="bg-blue-500 rounded-lg text-white px-1">0</span>
            <span class="ml-3"> Books </span>
        </a>
    </li>
    <li class="px-4 py-2 mb-1 rounded-lg hover:bg-white hover:text-blue-500 {{ Request::path() ==='threads' ? 'bg-white text-blue-500' :'' }} " :class="{ 'bg-gray-200': tab === 'allQuestion' }" x-on:click="tab = 'allQuestion'">
        <a href="/threads">
            <span class="bg-blue-500 rounded-lg text-white px-1">0</span>
            <span class="ml-3"> Forum </span>
        </a>
    </li>
</ul>