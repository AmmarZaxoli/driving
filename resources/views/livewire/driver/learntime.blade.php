<div>

    <h3>راهێنەر: {{ Auth::user()->name }}</h3>

    <div class="table-card mt-3">



        <div class="table-toolbar">
            <div class="row w-100 g-3 align-items-end">
                <!-- Search Box - Larger on mobile, flexible on desktop -->
                <div class="col-12 col-md-5">
                    <div class="search-box ">
                        <i class="bi bi-search"></i>
                        <input type="text" wire:model.live="search" placeholder="ل گەریان ب ناڤی قوتابی یان موبایل...">

                    </div>
                </div>

                <div class="col-2">
                    <button class="action-btn delete" wire:click="saveSelected" style="height: 43px; width: 60px;"
                        title="نەئامادە">
                        <i class="fas fa-user-xmark"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="table-responsive">

            <table class="custom-table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th><input type="checkbox" class="form-check-input" onclick="selectAll(this)"
                                style="cursor: pointer" /></th>
                        <th class="text-center">ناڤ</th>
                        <th class="text-center">ناونیشان</th>
                        <th class="text-center">موبایل</th>
                        <th class="text-center"> جورێ ئوتومبێلێ</th>
                        <th class="text-center">کات</th>
                        <th class="text-center">کات</th>
                        <th class="text-center">روژێن ماین</th>
                        <th class="text-center" style="width:150px">جورێ وانێ</th>
                        <th class="text-center">چالاکی</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $index => $Student)
                        <tr style="{{ $Student->todayAbsent ? 'background-color:#f8d7da;' : '' }}">
                            <td class="text-center" style="font-weight:600; color:var(--primary);">
                                {{ $index + 1 }}
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input row-check" style="cursor: pointer"
                                    wire:model="arrayId" value="{{ $Student->id }}" />
                            </td>
                            <td class="text-center">{{ $Student->name ?? '-' }}</td>
                            <td class="text-center">{{ $Student->location ?? '-' }}</td>
                            <td class="text-center">{{ $Student->mobile_number ?? '-' }}</td>
                            <td class="text-center fw-bold">
                                {{ $Student->typecar == 0 ? 'ئوتوماتیک' : ($Student->typecar == 1 ? 'عادی' : '-') }}
                            </td>


                            <td class="text-center">
                                {{ $Student->stimelearn ? \Carbon\Carbon::parse($Student->stimelearn)->format('h:i A') : '-' }}
                            </td>
                            <td class="text-center">
                                {{ $Student->ftimelearn ? \Carbon\Carbon::parse($Student->ftimelearn)->format('h:i A') : '-' }}
                            </td>
                            <td class="text-center">
                                {{ $Student->dayoflearn ?: '-' }}
                            </td>
                            <!-- Actions -->
                            <td class="text-center align-middle" style="width:150px">
                                <select class="form-control" style="width:140px"
                                    wire:model="learn.{{ $Student->id }}">
                                    <option value="">— هەڵبژێرە —</option>
                                    @foreach ($learnTypes as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-center">
                                    <button class="action-btn save" title="تومارکرن"
                                        wire:click="save({{ $Student->id }})">
                                        <i class="bi bi-check-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>

        </div>
        @if ($students->hasPages())
            <div class="d-flex align-items-center justify-content-between p-3 flex-wrap gap-2"
                style="border-top:1px solid var(--border);">

                <!-- Showing items info -->
                <div style="font-size:13px;color:var(--text-secondary);">
                    عرض {{ $students->firstItem() }}–{{ $students->lastItem() }} من أصل {{ $students->total() }}
                    مستخدم
                </div>

                <!-- Pager buttons -->
                <div class="pager d-flex gap-1">
                    <!-- Previous Page -->
                    <button class="pager-btn {{ $students->onFirstPage() ? 'disabled' : '' }}"
                        wire:click.prevent="gotoPage({{ $students->currentPage() - 1 }})"
                        @if ($students->onFirstPage()) disabled @endif>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <!-- Page Numbers -->
                    @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
                        <button class="pager-btn {{ $page == $students->currentPage() ? 'active' : '' }}"
                            wire:click.prevent="gotoPage({{ $page }})">
                            {{ $page }}
                        </button>
                    @endforeach

                    <!-- Next Page -->
                    <button class="pager-btn {{ $students->currentPage() == $students->lastPage() ? 'disabled' : '' }}"
                        wire:click.prevent="gotoPage({{ $students->currentPage() + 1 }})"
                        @if ($students->currentPage() == $students->lastPage()) disabled @endif>
                        <i class="bi bi-chevron-left"></i>
                    </button>
                </div>
            </div>
        @endif

    </div>

</div>
