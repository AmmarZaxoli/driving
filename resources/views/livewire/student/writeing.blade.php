<div>

    <div class="section-header mb-4">
        <h1 class="section-title-main">فورما وانان</h1>
    </div>

    <form wire:submit.prevent="saveGroupDay">
        <div class="table-card no-class mt-3">
            <div class="table-title">
                <div class="title-right">
                    <span class="title-dot green"></span>
                    تومارکرنا ئامادە بوونێ
                </div>
            </div>

            <div class="table-title">

                <div class="filter-group mt-4" style="flex:2;min-width:180px;position:relative" x-data="{ open: false }"
                    x-on:click.outside="open=false">

                    <div class="input-wrapper">

                        <input type="text" class="form-control @error('nameselected') is-invalid @enderror"
                            style="height:43px" wire:model.live="name" placeholder="گروپ" x-on:focus="open=true"
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
                                        x-on:click="open=false">

                                        {{ $group->name }}

                                    </div>
                                @endforeach

                            </div>

                        @endif

                    </div>
                </div>

                <button type="submit" class="btn-primary-custom" style="margin-top: 21px" wire:loading.attr="disabled">
                    <span>تۆمارکردن</span>
                    <i class="bi bi-plus-lg"></i>
                </button>
            </div>


            <div class="table-responsive">

                <table class="custom-table">

                    <thead>

                        <tr>

                            <th class="text-center">#</th>

                            <th class="text-center">
                                <input type="checkbox" class="form-check-input" wire:model.live="selectAll">
                            </th>

                            <th>ناڤ</th>

                          

                            <th class="text-center">موبایل</th>

                            <th class="text-center" style="min-width: 150px">هۆکار</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($students as $student)
                            <tr wire:key="student-{{ $student->id }}">

                                <td class="text-center table-number">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="text-center">

                                    <input type="checkbox" class="form-check-input" wire:model.live="arrayId"
                                        value="{{ $student->id }}">

                                </td>

                                <td class="t-name">
                                    {{ $student->name }}
                                </td>

                               

                                <td class="text-center">
                                    {{ $student->mobile_number ?? '-' }}
                                </td>

                                <td class="text-center">
                                    <input type="text" class="form-control" placeholder="هۆکار"
                                        wire:model.live="reasons.{{ $student->id }}">
                                </td>

                            </tr>

                        @empty
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </form>
</div>
