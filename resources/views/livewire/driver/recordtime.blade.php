<div>
    {{-- ===== HEADER ===== --}}
    <div class="section-header mb-4">
        <div>
            <h1 class="section-title-main">تۆمارکرنا کاتێ فێرکرنێ</h1>
            <p class="section-desc">ژ 7:00 ســـپــێـدێ تا 8:00 ئێڤاری — بێ ئەیــــنی</p>
        </div>
        <button class="btn-primary-custom" wire:click="toggleForm()">
            {{ $showForm ? 'گرتنا فورما ژڤانی' : 'تۆمارکرنا ژڤانی' }}
            <i class="bi {{ $showForm ? 'bi-x-lg' : 'bi-plus-lg' }}"></i>
        </button>
    </div>

    {{-- ===== ADD/EDIT FORM (Toggleable Inline) ===== --}}
    @if ($showForm)
        <div class="form-card mb-4">
            {{-- Friday block --}}
            @if ($this->isFriday)
                <div class="friday-warning mb-3">
                    <i class="fas fa-ban"></i>
                    رووژا ئەیــــنی ناتوانرێت هەلبژێرێت
                </div>
            @endif

            <div class="row g-3">
                {{-- Date --}}
                <div class="col-12 col-md-6">
                    <label class="form-label">رووژ</label>
                    <input type="date" wire:model.live="selectedDate"
                        class="form-control @error('selectedDate') is-invalid @enderror">
                    @error('selectedDate')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Coach --}}
                <div class="col-12 col-md-6">
                    <label class="form-label">ڕاهێنەر</label>
                    <select wire:model.live="selectedCoach"
                        class="form-select @error('selectedCoach') is-invalid @enderror">
                        <option value="">— هەلبژێرە —</option>
                        @foreach ($coaches as $coach)
                            <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                        @endforeach
                    </select>
                    @error('selectedCoach')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Student Autocomplete --}}
                <div class="col-12">
                    <label class="form-label">قوتابی</label>
                    <div class="input-wrapper" x-data="{ open: false }" x-on:click.outside="open = false">
                        <input type="text" class="form-control @error('selectedStudent') is-invalid @enderror"
                            style="height:43px" wire:model.live="studentSearch" placeholder="ناڤی قوتابی بنڤێسە..."
                            x-on:focus="open = true" @if ($studentSelected) readonly @endif>

                        <div class="input-line"></div>

                        @if ($studentSelected)
                            <button type="button" class="autocomplete-clear" wire:click="clearStudent">
                                <i class="fas fa-times"></i>
                            </button>
                        @endif

                        @if (!empty($studentList))
                            <div class="autocomplete-box" x-show="open">
                                @foreach ($studentList as $s)
                                    <div class="autocomplete-item"
                                        wire:click="selectStudent({{ $s['id'] }}, '{{ addslashes($s['name']) }}')"
                                        x-on:click="open = false">
                                        <div class="autocomplete-student-row">
                                            <div class="autocomplete-avatar">
                                                {{ mb_substr($s['name'], 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="autocomplete-name">{{ $s['name'] }}</div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    @error('selectedStudent')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Duration --}}
                <div class="col-12">
                    <label class="form-label">ماوەی فێرکرنێ</label>
                    <div class="duration-picker">
                        <label class="duration-opt {{ $duration == 1 ? 'active' : '' }}"
                            wire:click="$set('duration', 1)">
                            <i class="fas fa-clock"></i>
                            1 کاتژمێر
                        </label>
                        <label class="duration-opt {{ $duration == 2 ? 'active' : '' }}"
                            wire:click="$set('duration', 2)">
                            <i class="fas fa-clock"></i>
                            2 کاتژمێر
                        </label>
                    </div>
                </div>

                {{-- Time Slot --}}
                <div class="col-12">
                    <label class="form-label">کاتی دەستپێکرنێ</label>
                    <div class="slots-grid">
                        @foreach ($slots as $slot)
                            @php
                                $hour = (int) $slot;
                                $label =
                                    $hour < 12
                                        ? $slot . ' ســـپــێـدێ'
                                        : ($hour == 12
                                            ? '12:00 نیڤرووژ'
                                            : sprintf('%02d:00', $hour - 12) . ' ئــــێـڤـاری');

                                $isBlocked = in_array($slot, $blockedSlots);
                                $wouldOverflow = $hour + (int) $duration > 20;

                                $wouldOverlap = false;
                                if (!$isBlocked && !$wouldOverflow && (int) $duration === 2) {
                                    $nextSlot = sprintf('%02d:00', $hour + 1);
                                    $wouldOverlap = in_array($nextSlot, $blockedSlots);
                                }

                                $disabled = $isBlocked || $wouldOverflow || $wouldOverlap;
                                $isActive = $selectedSlot === $slot;
                            @endphp

                            <button type="button"
                                class="slot-btn {{ $isActive ? 'active' : '' }} {{ $disabled ? 'disabled' : '' }} {{ $isBlocked ? 'taken' : '' }}"
                                @if (!$disabled) wire:click="$set('selectedSlot', '{{ $slot }}')" @endif
                                @if ($disabled) disabled @endif
                                title="{{ $wouldOverflow ? 'دەڕوات دەرەوەی 8PM' : ($wouldOverlap ? 'پێچەلاوە دەبێت' : ($isBlocked ? 'تۆمارکراو' : $label)) }}">
                                {{ $label }}
                                @if ($isBlocked)
                                    <span class="slot-btn-badge taken">تۆمارکراو</span>
                                @elseif($wouldOverflow)
                                    <span class="slot-btn-badge overflow">8PM+</span>
                                @elseif($wouldOverlap)
                                    <span class="slot-btn-badge overlap">پێچەلاوە</span>
                                @endif
                            </button>
                        @endforeach
                    </div>
                    @error('selectedSlot')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Summary --}}
                @if ($selectedSlot && $duration)
                    @php
                        $startH = (int) $selectedSlot;
                        $endH = $startH + (int) $duration;
                        $startLabel =
                            $startH < 12
                                ? $selectedSlot . ' ســـپــێـدێ'
                                : ($startH == 12
                                    ? '12:00 نیڤرووژ'
                                    : sprintf('%02d:00', $startH - 12) . ' ئــــێـڤـاری');
                        $endLabel =
                            $endH < 12
                                ? sprintf('%02d:00', $endH) . ' ســـپــێـدێ'
                                : ($endH == 12
                                    ? '12:00 نیڤرووژ'
                                    : sprintf('%02d:00', $endH - 12) . ' ئــــێـڤـاری');
                    @endphp
                    <div class="col-12">
                        <div class="slot-summary">
                            <i class="fas fa-info-circle"></i>
                            {{ $startLabel }} — {{ $endLabel }}
                        </div>
                    </div>
                @endif
            </div>

            <div class="d-flex gap-2 mt-4 pt-3 border-top" style="border-color: var(--border) !important;">
                <button class="btn-primary-custom" wire:click="save" wire:loading.attr="disabled" wire:target="save"
                    @if ($this->isFriday) disabled @endif>
                    <i class="bi bi-check-lg"></i>
                    تۆمارکرن
                </button>
                <button class="btn-clear-custom" wire:click="toggleForm()">
                    <i class="bi bi-x-lg"></i>
                    داخستن
                </button>
            </div>

        </div>
    @endif

    {{-- ===== VIEW FILTERS ===== --}}
    <div class="table-card mb-4">
        <div class="table-toolbar">
            <div class="toolbar-filters">
                <div class="filter-group">
                    <label class="form-label">رووژ</label>
                    <input type="date" wire:model.live="viewDate" class="form-control toolbar-input">
                </div>

                <div class="filter-group" style="flex:1; min-width:200px;">
                    <label class="form-label">ڕاهێنەر</label>
                    <select wire:model.live="viewCoach" class="form-select toolbar-input">
                        <option value="">— ڕاهێنەرێ هەلبژێرە —</option>
                        @foreach ($coaches as $coach)
                            <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        {{-- Friday Warning --}}
        @if ($this->isViewFriday)
            <div class="friday-warning mt-4">
                <i class="fas fa-ban"></i>
                رووژا ئەیــــنی — نابیت  توماربکی
            </div>
        @endif

        {{-- ===== TIME GRID ===== --}}
        @if ($viewCoach && $viewDate && !$this->isViewFriday)
            <div class="time-grid">
                @foreach ($slots as $slot)
                    @php
                        $hour = (int) $slot;
                        $label =
                            $hour < 12
                                ? $slot . ' ســـپــێـدێ'
                                : ($hour == 12
                                    ? '12:00 نیڤرووژ'
                                    : sprintf('%02d:00', $hour - 12) . ' ئــــێـڤـاری');
                        $res = $reservations->get($slot);
                        $booked = $res !== null;

                        $isSecondHour = false;
                        if (!$booked) {
                            foreach ($reservations as $r) {
                                $rStart = (int) substr($r->start_time, 0, 2);
                                if ($r->duration == 2 && $hour == $rStart + 1) {
                                    $isSecondHour = true;
                                    break;
                                }
                            }
                        }
                    @endphp

                    <div class="time-slot {{ $booked ? 'booked' : ($isSecondHour ? 'blocked' : 'free') }}"
                        @if (!$booked && !$isSecondHour) wire:click="openFormWithSlot('{{ $slot }}')" @endif>

                        <div class="slot-time">{{ $label }}</div>

                        @if ($booked)
                            <div class="slot-student">
                                
                                <div class="slot-info">
                                    <div class="slot-name">{{ $res->student->name }}</div>
                                    <div class="slot-duration">
                                        {{ $res->duration }} کاتژمێر
                                        @if ($res->duration == 2)
                                            <span class="slot-range">
                                                ({{ substr($res->start_time, 0, 5) }} —
                                                {{ substr($res->end_time, 0, 5) }})
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="slot-actions">
                                    <button class="action-btn edit"
                                        wire:click.stop="editReservation({{ $res->id }})" title="گوهارتن">
                                        <i class="fas fa-pen"></i>
                                    </button>


                                    <button class="action-btn delete" title="ژێبرن"
                                        wire:click.prevent="$dispatch('confirmDelete', {id: {{ $res->id }}})">
                                        <i class="bi bi-trash"></i>
                                    </button>


                                </div>
                            </div>
                        @elseif($isSecondHour)
                            <div class="slot-blocked-label">
                                <i class="fas fa-lock"></i>
                                بەشێ دووەم
                            </div>
                        @else
                            <div class="slot-free-label">
                                <i class="fas fa-plus-circle"></i>
                                کلیک بکە بۆ تۆمارکرنێ
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- Legend --}}
            <div class="slot-legend">
                <span class="legend-item">
                    <span class="legend-dot free"></span> فالایە
                </span>
                <span class="legend-item">
                    <span class="legend-dot booked"></span> تومارکریە
                </span>
                <span class="legend-item">
                    <span class="legend-dot blocked"></span> بەشێ دووێ
                </span>
            </div>
        @elseif(!$viewCoach && $viewDate && !$this->isViewFriday)
            <div class="empty-state">
                <i class="fas fa-user-tie"></i>
                <p>ڕاهێنەرێ هەلبژێرە بۆ دیتنا کاتان</p>
            </div>
        @elseif(!$viewDate)
            <div class="empty-state">
                <i class="fas fa-calendar-day"></i>
                <p>رووژێ هەلبژێرە بۆ دیتنا کاتان</p>
            </div>
        @endif
    </div>

    @script
        <script>
            $wire.on("confirmDelete", (event) => {
                Swal.fire({
                    title: "یــێ پشــت راستی؟",
                    text: "دووبـارە نـەشـێ بــزڤـریــنی!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "بـەلـێ!",
                    cancelButtonText: "نەخێر",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Call the correct Livewire listener
                        $wire.deleteReservation(event.id);
                    }
                });
            });
        </script>
    @endscript
</div>
