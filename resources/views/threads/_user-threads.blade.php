@for ($i = 0; $i < 8; $i++)
<div class="mt-4 px-3 py-3 rounded-lg hover:bg-gray-200">
    <div class="flex mb-1" >
        <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-blue-500 rounded-full w-8" >
        <a href="#" class="ml-2 text-xl font-bold no-underline">This is user threads </a href="">
    </div>
    <div class="text-gray-500">
        asked feb 8 by 
        <span class="text-blue-400">John snow</span>
    </div>
    <div class="flex justify-between">
        <div class="flex items-center ">
            <a href="">
                <svg class="svg-icon " width="1.5rem" height = "1.5rem" viewBox="0 0 20 20" >
					<path d="M13.889,11.611c-0.17,0.17-0.443,0.17-0.612,0l-3.189-3.187l-3.363,3.36c-0.171,0.171-0.441,0.171-0.612,0c-0.172-0.169-0.172-0.443,0-0.611l3.667-3.669c0.17-0.17,0.445-0.172,0.614,0l3.496,3.493C14.058,11.167,14.061,11.443,13.889,11.611 M18.25,10c0,4.558-3.693,8.25-8.25,8.25c-4.557,0-8.25-3.692-8.25-8.25c0-4.557,3.693-8.25,8.25-8.25C14.557,1.75,18.25,5.443,18.25,10 M17.383,10c0-4.07-3.312-7.382-7.383-7.382S2.618,5.93,2.618,10S5.93,17.381,10,17.381S17.383,14.07,17.383,10"></path>
				</svg>
            </a>
            <a href="">
                <svg class="svg-icon"  width="1.5rem" height = "1.5rem" viewBox="0 0 20 20">
                    <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                </svg>
            </a>
        </div>
        <div>
            <span class="text-gray-500 px-2 rounded">3 votes </span>
            <span class="text-green-400 px-2 bg-green-100 rounded ml-12">3 answers </span>
            <span class="text-gray-500 px-2 rounded ml-12">3 views </span>
        </div>
    </div>
</div>
<hr>
@endfor