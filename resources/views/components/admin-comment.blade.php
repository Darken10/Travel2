@props(['comment','reponse'=>false])

<div class="my-4 px-3 bg-slate-100 rounded-lg ">
         <!-- Comments content -->
         <div class="pt-6">
            <!-- Comment row -->
            <div class="media flex pb-4">
              <a class="mr-4" href="#">
                <img class="rounded-full max-w-none w-12 h-12" src="{{ asset('image/image.jpg') }}" />
              </a>
              <div class="media-body">
                <div>
                  <a class="inline-block text-base font-bold mr-2" href="#">{{ $comment->user->name }}</a>
                  <span class="text-slate-500 dark:text-slate-300">{{ $comment->created_at->format('D d M Y H:i:s') }}</span>
                </div>
                <p>{!! nl2br(e( $comment->comment )) !!}</p>
                <div class="mt-2 flex items-center">
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
                  @if (!$reponse)
                    <a  href="{{ route('admin.comment.show',$comment) }}"
                    class=" no-underline text-black flex px-4 py-2 items-center hover:bg-grey-lighterpx-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                    
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-message-circle h-6 w-6 mr-1">
                          <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                        </svg>
                    
                    repondre
                    </a>
                  @endif
                </div>
              </div>
            </div>
            <!-- End comments row -->



            @if (count($comment->reponses)!=0)
                <!-- More comments -->
                <div class="w-full">
                    <a href="#"
                        class="py-3 px-4 w-full block bg-slate-100 dark:bg-slate-700 text-center rounded-lg font-medium hover:bg-slate-200 dark:hover:bg-slate-600 transition ease-in-out delay-75">
                        Show more comments ({{ count($comment->reponses) }})
                    </a>
                </div>
              <!-- End More comments -->
            @endif
          </div>
          <!-- End Comments content -->
    
</div>