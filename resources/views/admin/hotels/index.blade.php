@extends('admin.master')

@section('title', 'All Hotels')

@section('body')
<section class="content py-3">
    <div class="row">
        <div class="col-md-11 mx-auto">

            <!-- Top Header Card -->
            <div class="card mb-2 shadow-lg">
                <div class="card-header- px-2 py-2 d-flex justify-content-between align-items-center">
                    <h3 class="card-title w3-small text-bold text-muted pt-1">
                        <i class="fas fa-hotel text-primary"></i> Hotels
                    </h3>
                    <div>
                        <a href="{{ route('hotels.all') }}" target="_blank" class="btn btn-outline-info btn-xs py-1">
                            <i class="fas fa-code"></i> View Raw Data (JSON)
                        </a>
                        <a href="{{ route('admin.hotels.export') }}" class="btn btn-outline-success btn-xs py-1">
                            <i class="fas fa-file-excel"></i> Export to Excel
                        </a>
                        <a href="{{ route('admin.hotels.create') }}" class="btn btn-outline-primary btn-xs py-1">
                            <i class="fas fa-plus-square"></i> Add New Hotel
                        </a>
                    </div>
                </div>
            </div>

            <div class="card w3-round shadow-lg">
                <div class="card-header pl-2 py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title w3-small text-bold text-muted">
                            <i class="fas fa-th text-primary pt-1"></i> All Hotels 
                        </h3>

                        <!-- Search Box -->
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="search" name="q" class="hotel-search form-control border-right-0 border py-2"
                                    data-url="{{ route('admin.hotels.search') }}"
                                    placeholder="Search name, id...">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-transparent">
                                        <i class="fa fa-search w3-text-orange"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body bg-light px-0 pb-0 pt-2">
                    <div class="col-sm-12">
                        <div class="table-responsive data-container">
                            @include('admin.hotels.searchData')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        // Live Search for Hotels
        $(document).on('keyup', ".hotel-search", function(e){
            e.preventDefault();
            const $input = $(this);
            const url = $input.data('url');
            const query = $input.val();

            $.get(url, { q: query }, function(res) {
                if (res.success) {
                    $(".data-container").html(res.page);
                }
            });
        });
    });
</script>
@endpush
