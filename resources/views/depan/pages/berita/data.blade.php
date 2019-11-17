@if (count($berita)==0)
    <div class="row error">
        <div class="col-md-4 col-sm-4">&nbsp;</div>
        <div class="col-md-4 col-sm-4 text-center">
            <center>
                <img src="{{asset('images/logo/empty-result_shot.png')}}" style="" >
            </center>
        </div>
        <div class="col-md-4 col-sm-4">&nbsp;</div>

        <div class="col-md-12 col-sm-12 text-center">
            <h1>Mohon Maaf</h1>  
            <p class="top">Data {{ucwords($jenis)}} Belum Tersedia</p>
        </div>

    </div>
    
@else
    @foreach ($berita as $item)
        <div class="item">
            <div class="post-block">
                <div class="post-image">
                    <a href=""><img src="{{asset($item->file)}}" alt="{{$item->title}}" style="height: 195px;"></a>
                </div>
                <div class="post-content">
                    <div class="post-title">
                        <a href="{{url('publikasi/'.$jenis,str_slug($item->title))}}"><span>{{$item->title}}</span></a>
                    </div>
                    <div class="post-meta">
                        <span>
                            <a href="{{url('publikasi/'.str_slug($item->cat_berita->nama_kategori))}}">{{$item->cat_berita->nama_kategori}}</a>
                            <span> - {{tgl_indo($item->created_at)}} </span>
                        </span>
                    </div>
                    <div class="post-body">
                        <p>{{substr(strip_tags($item->isi),0,150)}} [...]</p>
                        <a class="btn btn-sm btn-primary pull-right" href="{{url('publikasi/'.$jenis,str_slug($item->title))}}"> Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-12">
            <nav class="" style="margin:0 auto;text-align:center">
                {{$berita->links()}}
            </nav>
        </div>
    </div>
@endif