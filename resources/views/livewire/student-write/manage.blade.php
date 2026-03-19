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
                            <th class="text-center">#</th>
                            <th class="text-center">ناڤ</th>
                            <th class="text-center">ناڤ و نیشان</th>
                            <th class="text-center">موبایل</th>
                            <th class="text-center">ڕاهێنەر</th>
                            <th class="text-center"> جورێ ئوتومبێلێ</th>
                            <th class="text-center">روژا فێرکرنێ</th>
                            <th class="text-center">چالاکی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendances as $index => $attendance)
                            <tr>
                                <td style="font-weight:600; color:var(--primary);" class="text-center">
                                    {{ $index + 1 }}
                                </td>

                                <td class="text-center">{{ $attendance->student->name ?? '-' }}</td>
                                <td class="text-center">{{ $attendance->student->location ?? '-' }}</td>
                                <td class="text-center">{{ $attendance->student->mobile_number ?? '-' }}</td>
                                <td class="text-center">{{ $attendance->coach->name ?? '-' }}</td>

                                <td class="text-center fw-bold">
                                    {{ $attendance->student->typecar == 0 ? 'ئوتوماتیک' : ($attendance->student->typecar == 1 ? 'عادی' : '-') }}
                                </td>
                                <td class="text-center" style="font-weight:600;color:var(--primary);">
                                    {{ $attendance->date_learn ?? '-' }}
                                </td>

                                <!-- Actions -->
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center align-items-center gap-2">


                                        <button class="action-btn edit" title="ژێبرنا نە ئامادە بوونێ"
                                            data-bs-toggle="modal" data-bs-target="#filterModal"
                                            wire:click="setAbsentId({{ $attendance->id }})">
                                            <i class="fas fa-user-xmark"></i>
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
            @if ($attendances->hasPages())
                <div class="d-flex align-items-center justify-content-between p-3 flex-wrap gap-2"
                    style="border-top:1px solid var(--border);">

                    <!-- Showing items info -->
                    <div style="font-size:13px;color:var(--text-secondary);">
                        عرض {{ $attendances->firstItem() }}–{{ $attendances->lastItem() }} من أصل
                        {{ $attendances->total() }}
                        مستخدم
                    </div>

                    <!-- Pager buttons -->
                    <div class="pager d-flex gap-1">
                        <!-- Previous Page -->
                        <button class="pager-btn {{ $attendances->onFirstPage() ? 'disabled' : '' }}"
                            wire:click.prevent="previousPage" @if ($attendances->onFirstPage()) disabled @endif>
                            <i class="bi bi-chevron-right"></i>
                        </button>

                        <!-- Page Numbers -->
                        @foreach ($attendances->getUrlRange(1, $attendances->lastPage()) as $page => $url)
                            <button class="pager-btn {{ $page == $attendances->currentPage() ? 'active' : '' }}"
                                wire:click.prevent="gotoPage({{ $page }})">
                                {{ $page }}
                            </button>
                        @endforeach

                        <!-- Next Page -->
                        <button
                            class="pager-btn {{ $attendances->currentPage() == $attendances->lastPage() ? 'disabled' : '' }}"
                            wire:click.prevent="nextPage" @if ($attendances->currentPage() == $attendances->lastPage()) disabled @endif>
                            <i class="bi bi-chevron-left"></i>
                        </button>
                    </div>
                </div>
            @endif
        </div>
        <div wire:loading wire:target="deleteabsent">
            @include('components.loading-overlay')
        </div>

        <div class="modal fade" id="filterModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-user-xmark" style="color:var(--primary)"></i> تصفية
                            النتائج</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">

                            <div class="col-12">
                                <label class="form-label">مێژو </label>
                                <input type="date" wire:model="date_learn" class="form-control" />
                            </div>
                            @error('date_learn')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn-primary-custom" wire:click="deleteabsent"
                            wire:loading.attr="disabled" wire:target="deleteabsent">
                            <span wire:loading.remove wire:target="deleteabsent">
                                گوهــریـن
                            </span>

                        </button>

                        <button type="button" class="btn-outline-custom" data-bs-dismiss="modal">هەلوەشاندن</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('closeModal', () => {
                let modalEl = document.getElementById('filterModal');
                let modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();
            });
        });
    </script>
</div>
