<div>
    @if (session()->has('success'))
    <div class="py-3 px-3 my-3 bg-green-300 text-green-700 rounded ">
        {{session('success')}}
    </div>
    @endif
    <form class="w-full" wire:submit.prevent="addComments">
        <div class="md:flex md:items-center mb-6">
            <div class="w-3/6">
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none "
                    id="image" type="file" placeholder="Choose Image" 
                    wire:change="$emit('fileChoosen')">
            </div>
            <div class="w-3/6">
                @if ($image)
                    <img src="{{$image}}" class="w-1/4 border rounded mx-3" >
                @endif
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="w-5/6">
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="inline-full-name" type="text" placeholder="Leave Comment"
                    wire:model.debounce.500ms="newComment">
            </div>
            <div class="w-1/6">
                <button
                    class="bg-transparent mx-3 hover:bg-purple-500 text-purple-700 font-semibold hover:text-white py-2 px-12 border border-purple-500 hover:border-transparent rounded"
                    type="submit">
                    Add
                </button>
            </div>
        </div>
        @error('newComment') <span class="text-red-500">{{ $message }}</span> @enderror
    </form>

    {{-- Show Comments --}}
    @foreach ($comments as $comment)
    <div class="w-full my-2">
        <div class="border border-gray-400  bg-white rounded p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8 flex justify-between">
                <div>
                    <div class="text-sm mb-4">
                        <span class="text-gray-900 font-bold text-xl leading-none">{{ $comment->creator->name }}</span>
                        <span class="text-gray-500 mx-3">{{$comment->created_at->diffForHumans()}}</span>
                    </div>
                    <p class="text-gray-700 text-base">{{$comment->body}}</p>
                </div>
                <span wire:click="remove({{$comment->id}})">
                    <i class="fas fa-times text-red-200 hover:text-red-500 cursor-pointer"></i>
                </span>
            </div>
        </div>
    </div>
    @endforeach
    {{$comments->links('pagination-links')}}
</div>

<script>
    // console.log(window.livewire);
    window.livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('image');
        let file       = inputField.files[0];
        let reader     = new FileReader();

        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);
    });
</script>