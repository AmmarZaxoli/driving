<div>
    {{-- ===== HEADER ===== --}}
    <div class="section-header mb-4">
        <div>
            <h1 class="section-title-main">فورما گروپان</h1>
        </div>
        <button class="btn-primary-custom" wire:click="toggleForm">
            @if ($Groupadd)
                گرتنا فورما فـێـرخــازی <i class="bi bi-x-lg"></i>
            @else
                زێدەکرنا فـێـرخــازی <i class="bi bi-plus-lg"></i>
            @endif
        </button>
    </div>

    {{-- ===== ADD GROUP FORM ===== --}}
    @if ($Groupadd)
        <div class="form-card mt-3">
            <form wire:submit.prevent="save">
                <div class="filter-group" style="flex:2; min-width:180px;">
                    <div class="form-group">
                        <div class="input-wrapper">
                            <input type="text" class="form-control @error('name1') is-invalid @enderror"
                                style="height:43px" wire:model="name1" placeholder="گروپ">
                            <div class="input-line"></div>
                        </div>
                        @error('name1')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-start mt-3">
                        <button type="submit" class="btn-primary-custom" wire:loading.attr="disabled">
                            <span>تۆمارکردن</span>
                            <i class="bi bi-plus-lg"></i>
                        </button>
                        <button type="button" class="btn-clear-custom" wire:click="resetForm">
                            <span>پاقـژکـــرن</span>
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif

    {{-- Loading overlay --}}
    <div wire:loading wire:target="save">
        @include('components.loading-overlay')
    </div>

    {{-- ===== TABLE 1 — NO GROUP ===== --}}
    <div class="table-card no-class mt-3">
        <div class="table-title">
            <div class="title-right">
                <span class="title-dot green"></span>
                فێرخوازێن بێ گروپ
                <span class="badge-status badge-pending ms-2">{{ $students->total() }}</span>
                <span class="selected-count">
                    قوتابیێن دەستنیشانکری: <strong>{{ count($arrayId) }}</strong>
                </span>
            </div>
            <button class="btn-toggle-table" wire:click="$toggle('table1')">
                <i class="fas {{ $table1 ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                <span>{{ $table1 ? 'شارتکرن' : 'نیشاندان' }}</span>
            </button>
        </div>

        <div class="table-toolbar">
            <div class="toolbar-filters">
                <div class="filter-group" style="flex:2; min-width:200px;">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="لێ گەریان..." wire:model.live.debounce.500ms="search">
                    </div>
                </div>

                <div class="filter-group" style="flex:2; min-width:180px; position:relative;" x-data="{ open: false }"
                    x-on:click.outside="open = false">
                    <div class="input-wrapper">
                        <input type="text" class="form-control @error('nameselected') is-invalid @enderror"
                            style="height:43px" wire:model.live="name" placeholder="گروپ" x-on:focus="open = true"
                            @if (!empty($nameselected)) readonly @endif>
                        <div class="input-line"></div>
                        @if (!empty($nameselected))
                            <button type="button" class="autocomplete-clear" wire:click="clearGroup">
                                <i class="fas fa-times"></i>
                            </button>
                        @endif
                        @if (!empty($groups))
                            <div class="autocomplete-box" x-show="open">
                                @foreach ($groups as $group)
                                    <div class="autocomplete-item" wire:click="selectGroup('{{ $group->name }}')"
                                        x-on:click="open = false">
                                        {{ $group->name }}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="filter-group">
                    <button class="btn-add-student" wire:click="saveSelected"
                        @if (empty($arrayId)) disabled @endif>
                        <i class="fas fa-user-plus"></i>
                        <span>زێدەکرن</span>
                    </button>
                </div>
            </div>
        </div>

        @if ($table1)
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">
                                <input type="checkbox" class="form-check-input" wire:model.live="selectAll">
                            </th>
                            <th>ناڤ</th>
                            <th class="text-center">ناونیشان</th>
                            <th class="text-center">موبایل</th>
                            <th class="text-center">جورێ ئوتومبێلێ</th>
                            <th class="text-center">فێرکرن</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr wire:key="student-{{ $student->id }}">
                                <td class="text-center table-number">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input" wire:model.live="arrayId"
                                        value="{{ $student->id }}">
                                </td>
                                <td class="t-name">{{ $student->name }}</td>
                                <td class="text-center">{{ $student->location ?? '-' }}</td>
                                <td class="text-center">{{ $student->mobile_number ?? '-' }}</td>
                                <td class="text-center fw-bold">{{ $student->typecar == 0 ? 'ئوتوماتیک' : 'عادی' }}
                                </td>
                                <td class="text-center fw-bold">{{ $student->learn == 0 ? 'فێرکرن' : 'وانە و فێرکرن' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Custom Pagination for Table 1 --}}
            @if ($students->hasPages())
                <div class="pagination-wrapper p-3 d-flex justify-content-between align-items-center">
                    <div class="info text-muted small">عرض {{ $students->firstItem() }}–{{ $students->lastItem() }}
                        من {{ $students->total() }}</div>
                    <div class="pager d-flex gap-1">
                        <button class="pager-btn" wire:click="previousPage('studentsPage')"
                            @if ($students->onFirstPage()) disabled @endif><i
                                class="bi bi-chevron-right"></i></button>
                        @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
                            <button class="pager-btn {{ $page == $students->currentPage() ? 'active' : '' }}"
                                wire:click="gotoPage({{ $page }}, 'studentsPage')">{{ $page }}</button>
                        @endforeach
                        <button class="pager-btn" wire:click="nextPage('studentsPage')"
                            @if (!$students->hasMorePages()) disabled @endif><i
                                class="bi bi-chevron-left"></i></button>
                    </div>
                </div>
            @endif
        @endif
    </div>

    {{-- ===== TABLE 2 — HAS GROUP ===== --}}
    <div class="table-card has-class mt-5">
        <div class="table-title">
            <div class="title-right">
                <span class="title-dot amber"></span>
                فێرخوازێن ب گروپ

            </div>
            <button class="btn-toggle-table" wire:click="$toggle('table2')">
                <i class="fas {{ $table2 ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                <span>{{ $table2 ? 'شارتکرن' : 'نیشاندان' }}</span>
            </button>
        </div>

        @if ($table2)
            <div class="table-toolbar">
                <div class="toolbar-filters d-flex gap-2">
                    <div class="search-box flex-grow-1">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="گەڕیان ل فێرخوازێن گروپکری..."
                            wire:model.live.debounce.500ms="search1">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="custom-table text-nowrap">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>ناڤ</th>
                            <th class="text-center">گروپ</th>
                            <th class="text-center">موبایل</th>
                            <th class="text-center">جورێ ئوتومبێلێ</th>
                            <th class="text-center">چالاکی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentsCa as $studentC)
                            <tr wire:key="classed-{{ $studentC->id }}">
                                <td class="text-center table-number">{{ $loop->iteration }}</td>
                                <td class="t-name text-success">{{ $studentC->name }}</td>
                                <td class="text-center"><span
                                        class="badge bg-light text-dark border">{{ $studentC->class }}</span></td>
                                <td class="text-center">{{ $studentC->mobile_number }}</td>
                                <td class="text-center">{{ $studentC->typecar == 0 ? 'ئوتوماتیک' : 'عادی' }}</td>

                                <td class="text-center d-flex justify-content-center align-items-center">
                                    <button class="btn-change-class"
                                        wire:click="setStudentToChange({{ $studentC->id }})" data-bs-toggle="modal"
                                        data-bs-target="#ChangeModal" title="گوهۆڕینا گروپێ قوتابی">
                                        <i class="fas fa-exchange-alt"></i>
                                        <span>گوهۆڕینا گروپی</span>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Custom Pagination for Table 2 --}}
            @if ($studentsCa->hasPages())
                <div class="pagination-wrapper p-3 d-flex justify-content-between align-items-center">
                    <div class="info text-muted small">عرض
                        {{ $studentsCa->firstItem() }}–{{ $studentsCa->lastItem() }} من {{ $studentsCa->total() }}
                    </div>
                    <div class="pager d-flex gap-1">
                        <button class="pager-btn" wire:click="previousPage('classedPage')"
                            @if ($studentsCa->onFirstPage()) disabled @endif><i
                                class="bi bi-chevron-right"></i></button>
                        @foreach ($studentsCa->getUrlRange(1, $studentsCa->lastPage()) as $page => $url)
                            <button class="pager-btn {{ $page == $studentsCa->currentPage() ? 'active' : '' }}"
                                wire:click="gotoPage({{ $page }}, 'classedPage')">{{ $page }}</button>
                        @endforeach
                        <button class="pager-btn" wire:click="nextPage('classedPage')"
                            @if (!$studentsCa->hasMorePages()) disabled @endif><i
                                class="bi bi-chevron-left"></i></button>
                    </div>
                </div>
            @endif
        @endif
    </div>

    <div class="modal fade" id="ChangeModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-users" style="color:var(--primary)"></i> گوهورینا گروپی
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="filter-group" style="flex:2; min-width:180px; position:relative;"
                            x-data="{ open: false }" x-on:click.outside="open = false">

                            <div class="input-wrapper">

                                <input type="text"
                                    class="form-control @error('nameselectedTochange') is-invalid @enderror"
                                    style="height:43px" wire:model.live="nameChange" placeholder="گروپ"
                                    x-on:focus="open = true" @if (!empty($nameselectedTochange)) readonly @endif>

                                <div class="input-line"></div>

                                @if (!empty($nameselectedTochange))
                                    <button type="button" class="autocomplete-clear" wire:click="clearGroupchange">
                                        <i class="fas fa-times"></i>
                                    </button>
                                @endif

                                @if (!empty($groupsChange))
                                    <div class="autocomplete-box" x-show="open">
                                        @foreach ($groupsChange as $group)
                                            <div class="autocomplete-item"
                                                wire:click="selectGroupchange('{{ $group->name }}')"
                                                x-on:click="open = false">
                                                {{ $group->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn-outline-custom" data-bs-dismiss="modal">هەلوەشاندن</button>


                    <button type="button" class="btn-primary-custom" wire:click="saveSelectedchange"
                        wire:target="saveSelectedchange">
                        <span wire:loading.remove wire:target="saveSelectedchange">
                            گوهــریـن
                        </span>

                    </button>

                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('closeModal', () => {
                let modalEl = document.getElementById('ChangeModal');
                let modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();
            });
        });
    </script>
</div>
