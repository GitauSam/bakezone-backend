@extends('layouts.dashboard-v2')

@section('content')
<div class="flex items-center justify-center  mt-24 mb-16">
    <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
        <div class="flex justify-center py-12">
            <div class="flex">
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Add Pastry</h1>
            </div>
        </div>
        <form method="POST" action="{{ route('pastry.store') }}">
            @csrf
            <div class="grid grid-cols-1 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Name</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="name" placeholder="Pastry Name e.g Cookies, Buns" />
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Ingredients(Separate with comma)</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="ingredients" placeholder="Ingredient e.g Flour,Milk,Brown Sugar" />
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cost</label>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                <!-- <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cost</label>
                    <input class="hidden py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="1200" />
                </div> -->
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">1 KG</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="cost_1kg" placeholder="1200" />
                </div>
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">2 KG</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="cost_2kg" placeholder="2300" />
                </div>
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">3 KG</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="cost_3kg" placeholder="3500" />
                </div>
            </div>

            <!-- <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Selection</label>
                <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Another Input</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Another Input" />
            </div> -->

            <!-- <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>
                <div class='flex items-center justify-center w-full'>
                    <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                        <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Select a photo</p>
                        </div>
                        <input type='file' class="hidden" name="pastry_img[]" multiple/>
                    </label>
                </div>
            </div> -->

            <div class="flex flex-col flex-wrap mx-auto py-8">
                <main class="border-2 border-gray-300 rounded-md">
                    <!-- file upload modal -->
                    <article aria-label="File Upload Modal" class="relative h-full flex flex-col bg-white rounded-md" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                        <!-- overlay -->
                        <div id="overlay" class="w-full h-full absolute top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center rounded-md">
                            <i>
                                <svg class="fill-current w-12 h-12 mb-3 text-blue-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z" />
                                </svg>
                            </i>
                            <p class="text-lg text-blue-700">Drop files to upload</p>
                        </div>

                        <!-- scroll area -->
                        <section class="h-full overflow-auto p-8 w-full h-full flex flex-col">
                            <header class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                                <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                                    <span>Drag and drop your</span>&nbsp;<span>files anywhere or</span>
                                </p>
                                <input id="hidden-input" type="file" multiple class="hidden" name="photos[]" />
                                <button id="button" class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                    Upload a file
                                </button>
                            </header>

                            <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                                To Upload
                            </h1>

                            <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                    <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                                    <span class="text-small text-gray-500">No files selected</span>
                                </li>
                            </ul>
                        </section>

                        <!-- sticky footer -->
                        <footer class="flex justify-end px-8 pb-8 pt-4">
                            <button id="cancel" class="ml-3 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                Cancel
                            </button>
                        </footer>
                    </article>
                </main>

                <!-- using two similar templates for simplicity in js code -->
                <template id="file-template">
                    <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                        <article tabindex="0" class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                            <img alt="upload preview" class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />

                            <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                <div class="flex">
                                    <span class="p-1 text-blue-800">
                                        <i>
                                            <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                            </svg>
                                        </i>
                                    </span>
                                    <p class="p-1 size text-xs text-gray-700"></p>
                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                        </svg>
                                    </button>
                                </div>
                            </section>
                        </article>
                    </li>
                </template>

                <template id="image-template">
                    <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                        <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                            <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

                            <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                <h1 class="flex-1"></h1>
                                <div class="flex">
                                    <span class="p-1">
                                        <i>
                                            <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                            </svg>
                                        </i>
                                    </span>

                                    <p class="p-1 size text-xs"></p>
                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                        </svg>
                                    </button>
                                </div>
                            </section>
                        </article>
                    </li>
                </template>
            </div>

        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
            <button class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="submit">Create</button>
        </div>
    </form>
</div>
</div>

<script>
    // click the hidden input of type file if the visible button is clicked
    // and capture the selected files
    const hidden = document.getElementById("hidden-input");
    const fileTempl = document.getElementById("file-template"),
        imageTempl = document.getElementById("image-template"),
        empty = document.getElementById("empty");
    // use to store pre selected files
    let FILES = {};
    // check if file is of type image and prepend the initialied
    // template to the target element
    function addFile(target, file) {
        const isImage = file.type.match("image.*"),
            objectURL = URL.createObjectURL(file);
        const clone = isImage ?
            imageTempl.content.cloneNode(true) :
            fileTempl.content.cloneNode(true);
        clone.querySelector("h1").textContent = file.name;
        clone.querySelector("li").id = objectURL;
        clone.querySelector(".delete").dataset.target = objectURL;
        clone.querySelector(".size").textContent =
            file.size > 1024 ?
            file.size > 1048576 ?
            Math.round(file.size / 1048576) + "mb" :
            Math.round(file.size / 1024) + "kb" :
            file.size + "b";
        isImage &&
            Object.assign(clone.querySelector("img"), {
                src: objectURL,
                alt: file.name
            });
        empty.classList.add("hidden");
        target.prepend(clone);
        FILES[objectURL] = file;
        console.log(FILES);
        console.log(hidden.files);
    }
    const gallery = document.getElementById("gallery"),
        overlay = document.getElementById("overlay");
    document.getElementById("button").onclick = (e) => {
        e.preventDefault();
        hidden.click();
    };
    hidden.onchange = (e) => {
        for (const file of e.target.files) {
            addFile(gallery, file);
        }

    };
    // use to check if a file is being dragged
    const hasFiles = ({
            dataTransfer: {
                types = []
            }
        }) =>
        types.indexOf("Files") > -1;
    // use to drag dragenter and dragleave events.
    // this is to know if the outermost parent is dragged over
    // without issues due to drag events on its children
    let counter = 0;
    // reset counter and append file to gallery when file is dropped
    function dropHandler(ev) {
        ev.preventDefault();
        for (const file of ev.dataTransfer.files) {
            addFile(gallery, file);
            overlay.classList.remove("draggedover");
            counter = 0;
        }
    }
    // only react to actual files being dragged
    function dragEnterHandler(e) {
        e.preventDefault();
        if (!hasFiles(e)) {
            return;
        }
        ++counter && overlay.classList.add("draggedover");
    }

    function dragLeaveHandler(e) {
        1 > --counter && overlay.classList.remove("draggedover");
    }

    function dragOverHandler(e) {
        if (hasFiles(e)) {
            e.preventDefault();
        }
    }
    // event delegation to caputre delete events
    // fron the waste buckets in the file preview cards
    gallery.onclick = ({
        target
    }) => {
        if (target.classList.contains("delete")) {
            const ou = target.dataset.target;
            document.getElementById(ou).remove(ou);
            gallery.children.length === 1 && empty.classList.remove("hidden");
            delete FILES[ou];
        }
    };
    // print all selected files
    // document.getElementById("submit").onclick = () => {
    //     alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
    //     console.log(FILES);
    // };
    // clear entire selection
    document.getElementById("cancel").onclick = (e) => {
        e.preventDefault();
        while (gallery.children.length > 0) {
            gallery.lastChild.remove();
        }
        FILES = {};
        empty.classList.remove("hidden");
        gallery.append(empty);
    };
</script>
<style>
    .hasImage:hover section {
        background-color: rgba(5, 5, 5, 0.4);
    }

    .hasImage:hover button:hover {
        background: rgba(5, 5, 5, 0.45);
    }

    #overlay p,
    i {
        opacity: 0;
    }

    #overlay.draggedover {
        background-color: rgba(255, 255, 255, 0.7);
    }

    #overlay.draggedover p,
    #overlay.draggedover i {
        opacity: 1;
    }

    .group:hover .group-hover\:text-blue-800 {
        color: #2b6cb0;
    }
</style>

@endsection