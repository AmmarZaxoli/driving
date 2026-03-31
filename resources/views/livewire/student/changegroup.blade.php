<div>

    {{-- ===== HEADER ===== --}}
    <div class="section-header mb-4">
        <div>
            <h1 class="section-title-main">دورستکرنا ژڤانێ گروپان</h1>
        </div>

        <button class="btn-primary-custom" wire:click="toggleForm1">
            @if ($makedateforgrop)
                گرتنا ژڤانێ وانێ<i class="bi bi-x-lg"></i>
            @else
                دانانا ژڤانێ وانێ<i class="bi bi-plus-lg"></i>
            @endif
        </button>
    </div>


    {{-- ===== ADD SCHEDULE FORM ===== --}}
    @if ($makedateforgrop)
        <div class="form-card mt-3">
            <form wire:submit.prevent="saveSelectedchange1">
                <div class="row g-3">

                    {{-- GROUP --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">گروپ</label>
                            <div class="input-wrapper" x-data="{ open: false }" x-on:click.outside="open = false">

                                <input type="text"
                                    class="form-control @error('nameselectedTochange1') is-invalid @enderror"
                                    wire:model.live="nameChange1" placeholder="لێ گەریان..." x-on:focus="open = true"
                                    @if (!empty($nameselectedTochange1)) readonly @endif>

                                <div class="input-line"></div>

                                @if (!empty($nameselectedTochange1))
                                    <button type="button" class="autocomplete-clear" wire:click="clearGroupchange1">
                                        <i class="fas fa-times"></i>
                                    </button>
                                @endif

                                @if (!empty($groupsChange1))
                                    <div class="autocomplete-box" x-show="open" x-transition>
                                        @foreach ($groupsChange1 as $group)
                                            <div class="autocomplete-item"
                                                wire:click="selectGroupchange1('{{ $group->name }}')"
                                                x-on:click="open = false">
                                                <div class="autocomplete-student-row">
                                                    <div class="autocomplete-avatar">
                                                        {{ mb_substr($group->name, 0, 1) }}
                                                    </div>
                                                    <div>
                                                        <div class="autocomplete-name">{{ $group->name }}</div>
                                                        @if ($group->dayoflearning)
                                                            <div class="autocomplete-sub">
                                                                {{ $group->dayoflearning }}
                                                                &nbsp;·&nbsp;
                                                                {{ $group->time1 }} – {{ $group->time2 }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                            @error('nameselectedTochange1')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- DATE --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">ڕێکەوت</label>
                            <div class="input-wrapper">
                                <input type="date" class="form-control @error('dayoflearning') is-invalid @enderror"
                                    wire:model.live="dayoflearning">
                                <div class="input-line"></div>
                            </div>
                            @error('dayoflearning')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- TIME START --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">دەستپێکردن</label>
                            <div class="input-wrapper">
                                <input type="time" class="form-control @error('time1') is-invalid @enderror"
                                    wire:model.live="time1">
                                <div class="input-line"></div>
                            </div>
                            @error('time1')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- TIME END --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">کۆتایی</label>
                            <div class="input-wrapper">
                                <input type="time" class="form-control @error('time2') is-invalid @enderror"
                                    wire:model.live="time2">
                                <div class="input-line"></div>
                            </div>
                            @error('time2')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="col-12 mt-2 d-flex gap-2">
                        <button type="submit" class="btn-primary-custom" wire:loading.attr="disabled">
                           
                            تۆمارکردن

                        </button>

                        <button type="button" class="btn-clear-custom" wire:click="resetForm1">
                            پاقژکرن
                        </button>
                    </div>

                </div>
            </form>
        </div>
    @endif


      <div wire:loading wire:target="saveInlineEdit,saveSelectedchange1">
        @include('components.loading-overlay')
    </div>


    {{-- ===== TABLE ===== --}}
    <div class="table-card mt-4">

        <div class="table-title">
            <div class="title-right">
                <div class="title-dot"
                    style="width:10px;height:10px;border-radius:50%;background:var(--primary);flex-shrink:0;"></div>
                لیستا گروپان
                <span class="badge-status badge-pending ms-2">
                    {{ $scheduledGroups->count() }} گروپ
                </span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>ناڤێ گروپی</th>
                        <th class="text-center">م_دەستپێکرنێ</th>
                        <th class="text-center">دەستپێن</th>
                        <th class="text-center">دووماهی</th>
                        <th class="text-center">چالاکی</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($scheduledGroups as $index => $group)
                        <tr wire:key="grp-{{ $group->id }}">

                            {{-- INDEX --}}
                            <td style="font-weight:600; color:var(--primary);" class="text-center">{{ $index + 1 }}</td>

                            {{-- NAME --}}
                            <td>
                                <div class="user-cell">

                                    <div>
                                        <div class="t-name">{{ $group->name }}</div>

                                    </div>
                                </div>
                            </td>

                            {{-- DATE --}}
                            <td class="text-center">
                                @if ($editingGroupId === $group->id)
                                    <input type="date" class="form-control"
                                        style="min-width:140px;display:inline-block;"
                                        wire:model.live="editDayoflearning">
                                    @error('editDayoflearning')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                @else
                                    @if ($group->dayoflearning)
                                        <span class="badge-status badge-active" style="font-size:15px;">
                                            <i class="bi bi-calendar3" style="font-size:15px;"></i>
                                            {{ $group->dayoflearning }}
                                        </span>
                                    @else
                                        <span class="text-secondary">—</span>
                                    @endif
                                @endif
                            </td>

                            {{-- TIME START --}}
                            <td class="text-center">
                                @if ($editingGroupId === $group->id)
                                    <input type="time" class="form-control"
                                        style="min-width:110px;display:inline-block;" wire:model.live="editTime1">
                                    @error('editTime1')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                @else
                                    @if ($group->time1)
                                        <span class="badge-status badge-active" style="font-size:15px;">
                                            <i class="bi bi-clock" style="font-size:15px;"></i>
                                            {{ \Carbon\Carbon::parse($group->time1)->format('h:i A') }}
                                        </span>
                                    @else
                                        <span class="text-secondary">—</span>
                                    @endif
                                @endif
                            </td>

                            {{-- TIME END --}}
                            <td class="text-center">
                                @if ($editingGroupId === $group->id)
                                    <input type="time" class="form-control"
                                        style="min-width:110px;display:inline-block;" wire:model.live="editTime2">
                                    @error('editTime2')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                @else
                                    @if ($group->time2)
                                        <span class="badge-status badge-pending" style="font-size:15px;">
                                            <i class="bi bi-clock-history" style="font-size:15px;"></i>
                                            {{ \Carbon\Carbon::parse($group->time2)->format('h:i A') }}
                                        </span>
                                    @else
                                        <span class="text-secondary">—</span>
                                    @endif
                                @endif
                            </td>




                            {{-- ACTIONS --}}
                            <td class="text-center">
                                <div class="action-btns justify-content-center">
                                    @if ($editingGroupId === $group->id)
                                        {{-- Save inline edit --}}
                                        <button class="action-btn save" title="تۆمار"
                                            wire:click="saveInlineEdit({{ $group->id }})"
                                            wire:loading.attr="disabled"
                                            wire:target="saveInlineEdit({{ $group->id }})">
                                            <span wire:loading.remove
                                                wire:target="saveInlineEdit({{ $group->id }})">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span wire:loading wire:target="saveInlineEdit({{ $group->id }})">
                                                <i class="fas fa-spinner fa-spin" style="font-size:11px;"></i>
                                            </span>
                                        </button>

                                        {{-- Cancel inline edit --}}
                                        <button class="action-btn delete" title="بەتالکردن" wire:click="cancelEdit">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    @else
                                        {{-- View students --}}
                                        <button class="action-btn view" title="خوێندکار"
                                            wire:click="openStudentsModal('{{ $group->name }}')">
                                            <i class="fas fa-users"></i>
                                        </button>

                                        {{-- Edit inline --}}
                                        <button class="action-btn edit" title="گۆڕین"
                                            wire:click="startEdit({{ $group->id }},'{{ $group->dayoflearning }}','{{ $group->time1 }}','{{ $group->time2 }}')">
                                            <i class="fas fa-pen"></i>
                                        </button>

                                        {{-- Load to form --}}
                                        <button class="action-btn print" title="بیخە فورمێ"
                                            wire:click="loadGroupToForm('{{ $group->name }}')">
                                            <i class="fas fa-arrow-up"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>

                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>

    </div>


    {{-- ===== STUDENTS MODAL ===== --}}
    @if ($showStudentsModal)
        <div class="modal fade show d-block" tabindex="-1" 
            style="background: rgba(0,0,0,0.45); backdrop-filter: blur(4px);" wire:click.self="closeStudentsModal"
            x-data x-on:keydown.escape.window="$wire.closeStudentsModal()" >

            <div class="modal-dialog modal-dialog-centered modal-lg" >
                <div class="modal-content">

                    <div class="modal-header">

                        <button class="btn-close" wire:click="closeStudentsModal"></button>
                    </div>

                    <div class="modal-body">

                        {{-- SEARCH --}}
                        <div class="search-box mb-3">
                            <i class="bi bi-search"></i>
                            <input type="text" placeholder="گەڕان بە ناڤ یان مۆبایل..."
                                wire:model.live.debounce.300ms="modalSearch">
                        </div>

                        @if ($modalStudents instanceof \Illuminate\Pagination\LengthAwarePaginator && $modalStudents->count() > 0)

                            <div class="table-responsive">
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th style="width:42px;">#</th>
                                            <th>ناڤ</th>
                                            <th>مۆبایل</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($modalStudents as $i => $student)
                                            <tr wire:key="ms-{{ $student->id }}">
                                                <td style="font-weight:600; color:var(--primary);"
                                                    class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="user-cell">

                                                        <span class="t-name" style="font-size:14px;">
                                                            {{ $student->name }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td style="color:var(--text-secondary);font-size:13px;">
                                                    <i class="bi bi-phone me-1"></i>
                                                    {{ $student->mobile_number ?? '—' }}
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- PAGINATION --}}
                            @if ($modalStudents->hasPages())
                                <div class="d-flex justify-content-between align-items-center mt-3 px-1">
                                    <span style="font-size:12px;color:var(--text-secondary);">
                                        {{ $modalStudents->firstItem() }} – {{ $modalStudents->lastItem() }}
                                        لە {{ $modalStudents->total() }}
                                    </span>
                                    <div class="pager">
                                        <button class="pager-btn" wire:click="previousPage('modalPage')"
                                            @if ($modalStudents->onFirstPage()) disabled @endif>
                                            <i class="bi bi-chevron-right"></i>
                                        </button>
                                        @foreach ($modalStudents->getUrlRange(1, $modalStudents->lastPage()) as $page => $url)
                                            <button
                                                class="pager-btn {{ $page === $modalStudents->currentPage() ? 'active' : '' }}"
                                                wire:click="gotoPage({{ $page }}, 'modalPage')">
                                                {{ $page }}
                                            </button>
                                        @endforeach
                                        <button class="pager-btn" wire:click="nextPage('modalPage')"
                                            @if (!$modalStudents->hasMorePages()) disabled @endif>
                                            <i class="bi bi-chevron-left"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="empty-state" style="padding:40px 0;">
                                <i class="bi bi-people"></i>
                                <p>هیچ خوێندکارێ نەدۆزرایەوە</p>
                            </div>

                        @endif

                    </div>

                    <div class="modal-footer justify-content-between">
                        <span style="font-size:13px;color:var(--text-secondary);">
                            @if ($modalStudents instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                کۆی خوێندکاران:
                                <strong style="color:var(--text);">{{ $modalStudents->total() }}</strong>
                            @endif
                        </span>
                        <button class="btn-outline-custom" wire:click="closeStudentsModal">
                             هەلوەشاندن
                        </button>
                    </div>

                </div>
            </div>
        </div>
    @endif


</div>
