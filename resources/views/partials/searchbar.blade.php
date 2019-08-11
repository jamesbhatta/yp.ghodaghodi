@push('styles')
<style>
 .select2-container--default
 .select2-selection--single{
    border-top: none;
    border-right: none;
    border-bottom: none;
    border-left: none;
    outline: none;
    border-radius: 0;
    /*height: auto!important;*/
    height: 68px;
    width: 100%;
}
.select2-container--default
.select2-selection--single
.select2-selection__rendered {
 color: #444;
 line-height: 32px;
}
.select2-container .select2-selection--single .select2-selection__rendered {
 display: block;
 padding: 15px;
 overflow: hidden;
 text-overflow: ellipsis;
 white-space: nowrap;
}
.select2-container--default
.select2-selection--single
.select2-selection__arrow{
 height: 32px;
 position: absolute;
 top: 15px;
 right: 5px;
 width: 20px;
}
</style>
@endpush
<div class="container-fluid white mt-0 p-4">
    <div class="container unique-color accent-4 p-2 z-depth-1 rounded-0">
        <form action="{{ route('search') }}" class="form">
            <div class="md-form input-group p-4 white-text">
                <div class="input-group-prepend">
                    <span class="input-group-text md-addon white border border-white rounded-left"><i class="fa fa-search -text fa-lg"></i></span>
                </div>
                <input type="text" name="keyword" class="form-control white border-0" placeholder="What are you looking for?">

                <div class="input-group-prepend">
                    <span class="input-group-text md-addon white border border-white"><i class="fa fa-map-marker-alt fa-lg"></i></span>
                </div>
                <select name="city" id="location" class="form-control white border-0">
                    <option value=""></option>
                </select>

                <div class="input-group-prepend white">
                    <span class="input-group-text md-addon white border border-white"><i class="fa fa-sitemap fa-lg"></i></span>
                </div>

                <select name="category" id="category" class="form-control white border-0">
                    <option value=""></option>
                </select>
                <div class="input-group-prepend white rounded-right">
                    <button type="submit" class="btn yellow accent-4 btn-lg rounded-0 z-depth-0">Find Now</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#location').select2({
            placeholder: 'Where ?',
            ajax: {
                url: '/api/cities',
                processResults: function (data) {
                    return {
                        results: data.city.map(function (city) {
                            return {
                                id: city.id,
                                text: city.name
                            };
                        })
                    };
                }
            }
        });

        $('#category').select2({
            placeholder: 'Category',
            ajax: {
                url: '/api/categories',
                processResults: function (data) {
                    return {
                        results: data.category.map(function (category) {
                            return {
                                id: category.id,
                                text: category.name
                            };
                        })
                    };
                }
            }
        });
    });
</script>
@endpush