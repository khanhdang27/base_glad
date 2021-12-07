<div class="modal fade image-gallery" tabindex="-1" role="dialog" aria-labelledby="image-gallery" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" id="popup-product-image">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="image-gallery">{{ trans('Image Gallery') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('post.product.add_image', $data->id) }}" method="post" id="gallery-form">
                    <div id="gallery" class="image-box">
                        @foreach($data->images as $item)
                            <div class="image-item">
                                <button type="button" href="javascript:" class="btn btn-outline-danger btn-remove"><i class="fa fa-trash"></i></button>
                                <input type="hidden" value="{{ $item->image }}" name="images[]">
                                <img src="{{ $item->image }}" alt="{{ $item->image }}">
                            </div>
                        @endforeach
                    </div>
                    <div class=" py-3">
                        <div class="col-md-8 input-group">
                            <a href="javascript:" class="btn btn-primary btn-elfinder">{{ trans('Add more') }}</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect text-left" id="submit-gallery">Save</button>
                <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).on("click", "#submit-gallery", function () {
            $('#gallery-form').submit();
        });

        $(document).on('click', ".btn-remove", function () {
            $(this).parent().remove();
        })
    </script>
@endpush
