@props(['reponse'])

<!-- reponses content -->
<div class="pt-6 w-full" style="position: left">
    <!-- Reponse row -->
    <div class="media flex pb-4 w-full justify-between">
       
        <div class="media-body w-full">
            <div class="text-end">
                <a class="inline-block text-base font-bold mr-2" href="#">{{ $reponse->user->name }}</a>
            </div>

            <div class="  bg-zinc-200 mx-3 p-3 rounded-2xl w-auto flex-row">
                <p class="flex justify-end">{!! nl2br(e( $reponse->reponse )) !!}</p>
                <div class="mt-4 flex justify-end items-center ">
                    <a class="inline-flex items-center py-2 mr-3" href="#">
                    <span class="mr-2">
                        <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                        viewBox="0 0 24 24">
                        <path
                            d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                        </path>
                        </svg>
                    </span>
                    <span class="text-base font-bold">12</span>
                    </a>
                    <span class=" left text-slate-500 dark:text-slate-300">{{ $reponse->created_at->format('D d M Y H:i:s') }}</span>
                </div>
            </div>
        </div>

        <div>
            <a class="mr-4" href="#">
                <img class="rounded-full max-w-none w-12 h-12" src="{{ asset('image/image.jpg') }}" />
            </a>
        </div>
    </div>
    <!-- End reponses row -->
</div>