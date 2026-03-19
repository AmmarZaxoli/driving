<div>

    <div class="section-header mb-4">
        <div>
            <h1 class="section-title-main">فورما نە ئامادە بوویان</h1>
        </div>
    </div>


    <div class="form-card">
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label" for="coach_id">ڕاهێنەر</label>
                <select wire:model.live="coach_id" id="coach_id" class="form-control">
                    <option value="">- هەلبژێرە -</option>
                    @foreach ($coaches as $coach)
                        <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label" for="date_from">ژ مێژویا </label>
                <input type="date" wire:model.live="date_from" id="date_from" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label" for="date_to">تا مێژویا</label>
                <input type="date" wire:model.live="date_to" id="date_to" class="form-control">
            </div>
        </div>
    </div>
    <div class="table-card mt-3">
        <div class="table-toolbar">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" wire:model.live="student_name" placeholder="گەریان ل ناڤ، موبایل...">

            </div>
        </div>
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">ناڤ</th>
                        <th class="text-center">موبایل</th>
                        <th class="text-center">ڕاهێنەر</th>
                        <th class="text-center">م _ نە ئامادە بوونێ</th>
                        <th class="text-center">چالاکی</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($absents as $absent)
                        <tr>
                            <td class="text-center table-number">{{ $absents->firstItem() + $loop->index }}</td>
                            <td>{{ $absent->student->name }}</td>
                            <td class="text-center table-number">{{ $absent->student->mobile_number ?? '-' }}</td>
                            <td class="text-center">{{ $absent->coach->name }}</td>
                            <td class="text-center">{{ $absent->date_day }}</td>

                            <td class="align-middle">
                                <div class="d-flex justify-content-center align-items-center gap-2">


                                    <button class="action-btn edit" title="ژێبرنا نە ئامادە بوونێ"
                                        data-bs-toggle="modal" data-bs-target="#filterModal"
                                        wire:click="setAbsentId({{ $absent->id }})">
                                        <i class="fas fa-user-xmark"></i>
                                    </button>



                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($absents->hasPages())
            <div class="d-flex align-items-center justify-content-between p-3 flex-wrap gap-2"
                style="border-top:1px solid var(--border);">

                <!-- Showing items info -->
                <div style="font-size:13px;color:var(--text-secondary);">
                    دیتن {{ $absents->firstItem() }} – {{ $absents->lastItem() }} ژ
                    {{ $absents->total() }} نە ئامادە بوویا
                </div>

                <!-- Pager buttons -->
                <div class="pager d-flex gap-1">
                    <!-- Previous Page -->
                    <button class="pager-btn {{ $absents->onFirstPage() ? 'disabled' : '' }}"
                        wire:click.prevent="previousPage" @if ($absents->onFirstPage()) disabled @endif>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <!-- Page Numbers -->
                    @foreach ($absents->getUrlRange(1, $absents->lastPage()) as $page => $url)
                        <button class="pager-btn {{ $page == $absents->currentPage() ? 'active' : '' }}"
                            wire:click.prevent="gotoPage({{ $page }})">
                            {{ $page }}
                        </button>
                    @endforeach

                    <!-- Next Page -->
                    <button class="pager-btn {{ $absents->currentPage() == $absents->lastPage() ? 'disabled' : '' }}"
                        wire:click.prevent="nextPage" @if ($absents->currentPage() == $absents->lastPage()) disabled @endif>
                        <i class="bi bi-chevron-left"></i>
                    </button>
                </div>
            </div>
        @endif
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
                            <input type="date" wire:model="day_learn" class="form-control" />
                        </div>

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
    <div wire:loading>
        @include('components.loading-overlay')
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
