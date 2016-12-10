 <div class="col-md-9">
 @foreach ($advertisementContent as $adv)
            
              <div class="center col-md-4">
                    <a target="_blank" href="{{ $adv->affLink }}">
                        <img border="0" title="betting foot" class="advertisement-image" alt="betting foot" src="{{ URL::asset('/assets/images/bm/admin-advertisement-content/'.$adv->imageName) }}">
                    </a>
                </div>
            
            @endforeach
            </div>