<div>

    <div class="modern-card">
        <!-- Animated Header -->
        <div class="section-header mb-4">
            <div>
                <h1 class="section-title-main"> لیستا ئامادە بوونا فێرخازان</h1>
            </div>
        </div>

        <div class="table-card mt-3">


            <div class="table-toolbar">
                <div class="row ">
                    <!-- Search Box - Larger on mobile, flexible on desktop -->
                    <div class="col-12 col-md-5">
                        <div class="search-box ">
                            <i class="bi bi-search"></i>
                            <input type="text" wire:model.live="search"
                                placeholder="ل گەریان ب ناڤی قوتابی یان موبایل...">

                        </div>
                    </div>

                    <!-- Coach Select with better styling -->
                    <div class="col-12 col-md-4">
                        <div class="filter-group">
                            <div class="select-wrapper">
                                <select wire:model.live="coach_id" style="height: 43px" class="form-select">
                                    <option value="">— ڕاهێنەران —</option>
                                    @foreach ($coachs as $coach)
                                        <option value="{{ $coach->id }}">
                                            {{ $coach->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Print Button - Using Your Design Classes -->
                    <div class="col-2">
                        <button class="action-btn print" style="height: 43px;width: 60px;" title="پرێنت"
                            onclick="printFilteredStudents()">
                            <i class="bi bi-printer"></i>
                        </button>
                    </div>

                    <div class="col-md-3 mt-3 mt-md-10">
                        <label class="form-label" for="date_from">ژ مێژویا </label>
                        <input type="date" wire:model.defer="date_from" id="date_from" class="form-control">
                    </div>

                    <div class="col-md-3 mt-3 mt-md-10">
                        <label class="form-label" for="date_to">تا مێژویا</label>
                        <input type="date" wire:model.defer="date_to" id="date_to" class="form-control">
                    </div>

                   <div class="col-4" style="margin-top: 50px">
                     <button class="btn-filter" wire:click="filter">
                       <i class="fas fa-filter"></i> Filter
                    </button>
                   </div>
                </div>
            </div>

            <div class="table-responsive">

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">ناڤ</th>
                            <th class="text-center">ناونیشان</th>
                            <th class="text-center">موبایل</th>
                            <th class="text-center">ڕاهێنەر</th>
                            <th class="text-center"> جورێ ئوتومبێلێ</th>
                            <th class="text-center">روژا دەستپێکرنێ</th>
                            <th class="text-center">روژێن ماین</th>
                            <th class="text-center">چالاکی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Students as $index => $Student)
                            <tr>
                                <td style="font-weight:600; color:var(--primary);">
                                    {{ $index + 1 }}
                                </td>

                                <td class="text-center">{{ $Student->name ?? '-' }}</td>
                                <td class="text-center">{{ $Student->location ?? '-' }}</td>
                                <td class="text-center">{{ $Student->mobile_number ?? '-' }}</td>
                                <td class="text-center">{{ $Student->coach->name ?? '-' }}</td>
                               
                                <td class="text-center fw-bold">
                                    {{ $Student->typecar == 0 ? 'ئوتوماتیک' : ($Student->typecar == 1 ? 'عادی' : '-') }}
                                </td>
                                <td class="text-center">{{ $Student->data_start ?? '-' }}</td>
                                <td class="text-center">{{ $Student->dayoflearn ?? '-' }}</td>

                                <!-- Actions -->
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                       

                                        <button class="action-btn delete" title="ژێبرن"
                                            wire:click.prevent="$dispatch('confirmDelete', {id: {{ $Student->id }}})">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                   
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{-- <iframe id="printFrame" style="display:none;"></iframe> --}}
            </div>

            <!-- Pagination -->
            @if ($Students->hasPages())
                <div class="d-flex align-items-center justify-content-between p-3 flex-wrap gap-2"
                    style="border-top:1px solid var(--border);">

                    <!-- Showing items info -->
                    <div style="font-size:13px;color:var(--text-secondary);">
                        عرض {{ $Students->firstItem() }}–{{ $Students->lastItem() }} من أصل {{ $Students->total() }}
                        مستخدم
                    </div>

                    <!-- Pager buttons -->
                    <div class="pager d-flex gap-1">
                        <!-- Previous Page -->
                        <button class="pager-btn {{ $Students->onFirstPage() ? 'disabled' : '' }}"
                            wire:click.prevent="previousPage" @if ($Students->onFirstPage()) disabled @endif>
                            <i class="bi bi-chevron-right"></i>
                        </button>

                        <!-- Page Numbers -->
                        @foreach ($Students->getUrlRange(1, $Students->lastPage()) as $page => $url)
                            <button class="pager-btn {{ $page == $Students->currentPage() ? 'active' : '' }}"
                                wire:click.prevent="gotoPage({{ $page }})">
                                {{ $page }}
                            </button>
                        @endforeach

                        <!-- Next Page -->
                        <button
                            class="pager-btn {{ $Students->currentPage() == $Students->lastPage() ? 'disabled' : '' }}"
                            wire:click.prevent="nextPage" @if ($Students->currentPage() == $Students->lastPage()) disabled @endif>
                            <i class="bi bi-chevron-left"></i>
                        </button>
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
