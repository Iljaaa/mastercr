@php
/**
 * @var \App\Models\Candidate[] $candidates
 * @var \App\Models\DesiredPosition[] $desiredPositions
 * @var \App\Models\Specialization[] $specializations
 */

$genders = __('messages.genders');
//dd(__('messages.genders.' . 'male'));

@endphp
<table class="table table-bordered">
    <thead>
    <tr>
        <th style="min-width: 100px; vertical-align: middle">№№ п/п</th>
        <th style="min-width: 300px; vertical-align: middle">ФИО, <br />пол, <br />родился, <br />гражданство, <br />готовность к переезду</th>
        <th style="min-width: 300px; vertical-align: middle">Желаемая должность и зарплата</th>
        <th style="min-width: 300px; vertical-align: middle">Специализации</th>
        <th style="min-width: 200px; vertical-align: middle">Почта и телефон</th>
        <th style="width: 150px; min-width: 150px; vertical-align: middle">Оценка по<br />10 бальной<br />системе</th>

        <th style="width: 150px; min-width: 150px; vertical-align: middle">Первичные соединеия по подстанциям 110кВ и выше</th>
        <th style="width: 150px; min-width: 150px; vertical-align: middle">Строитель разрабока разделов КР по подстанциям</th>
        <th style="width: 150px; min-width: 150px; vertical-align: middle">Строитель разработка КР по линиям 110 кВ линейщик фундамент</th>
        <th style="width: 150px; min-width: 150px; vertical-align: middle">Монтажные части линии сама расстановка опор</th>
        <th style="width: 150px; min-width: 150px; vertical-align: middle">Релейная защита и автоматика (РЗА)</th>
        <th style="width: 150px; min-width: 150px; vertical-align: middle">Автоматизированная система управления технологическим процессом (АСУТП)</th>
        <th style="width: 150px; min-width: 150px; vertical-align: middle">Автоматизированная система контроля и учёта электроэнергии (АСКУЭ)</th>
        <th style="width: 150px; min-width: 150px; vertical-align: middle">Телемеханника (ТМ)</th>
        <th style="width: 150px; min-width: 150px; vertical-align: middle">Средства связи (СС)</th>
        <th style="width: 150px; min-width: 150px; vertical-align: middle">Комплекс техниских средств безопасности (КТСБ)</th>
        <th style="width: 200px; min-width: 200px; vertical-align: middle">Есть ли у Вас опыт проектирования на подстанциях и воздушных линиях 110кВ?</th>
        <th style="width: 150px; min-width: 150px; vertical-align: middle">Готовность работать</th>
        <th style="width: 200px; min-width: 200px;"></th>
    </tr>
    <tr>
        <th></th>
        <th>
            <div>
                <input type="text" name="fio" class="form-control" placeholder="Поиск по ФИО" value="{{ request()->input('fio') }}" />
            </div>

            <div class="mt-1">
                <select type="text" name="gender" class="form-control">
                    <option value="">Выбирите пол</option>
                    @foreach(\App\Domain\Gender::getValue() as $v)
                        <option value="{{ $v }}" @if(request()->input('gender') == $v) selected @endif>{{ mb_ucfirst($genders[$v]) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-1">
                <input type="text" name="birth_place" class="form-control" placeholder="Поиск по месту рождения" value="{{ request()->input('birth_place') }}" />
            </div>

            <div class="mt-1">
                <input type="text" name="citizenship" class="form-control"  placeholder="Поиск по национальности" value="{{ request()->input('citizenship') }}" />
            </div>

            <div class="mt-1">
                <select type="text" name="relocation_ready" class="form-control">
                    <option value="">Готов к переезду</option>
                    <option value="1">Готов</option>
                    <option value="0">Не готов</option>
                </select>
            </div>
        </th>
        <td style="vertical-align: top">
            <select multiple="" class="form-control" name="desired_positions[]" style="height: 140px">
                @php ($selectedPositions = request()->get('desired_positions', []))
                @foreach($desiredPositions as $dp)
                    <option value="{{$dp->id }}" @if(in_array($dp->id, $selectedPositions)) selected @endif>{{$dp->position }}</option>
                @endforeach
            </select>
            <div class="mt-1">
                Желаемая ЗП:
                <div style="display: flex">
                    <input type="number" name="salary_min" class="form-control" placeholder="Мин" value="{{ request()->input('salary_min') }}" style="width: 50%" />
                    <input type="number" name="salary_max" class="form-control" placeholder="Макс" value="{{ request()->input('salary_max') }}" style="width: 50%" />
                </div>
            </div>
        </td>
        <th style="vertical-align: top">
            <select multiple="" class="form-control" id="specializations" name="specializations[]" style="height: 205px">
                @php ($selectedSpecializations = request()->get('specializations', []))
                @foreach($specializations as $s)
                    <option value="{{$s->id }}" @if(in_array($s->id, $selectedSpecializations)) selected @endif>{{$s->specialization }}</option>
                @endforeach
            </select>
        </th>
        <th style="vertical-align: top">
            <div>
                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ request()->input('email') }}" />
            </div>
            <div class="mt-1">
                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ request()->input('phone') }}" />
            </div>
        </th>
        <th style="vertical-align: top">
            <input type="number" class="form-control" name="rating_min" placeholder="Min" value="{{ request()->input('rating_min') }}"  />
            <input type="number" class="form-control" name="rating_max" placeholder="Max" value="{{ request()->input('rating_max') }}"  />
        </th>
        <th style="vertical-align: top; text-align: center" >
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="primary_connections" name="primary_connections" @if( request()->input('primary_connections')) checked @endif>
                <label class="form-check-label" for="primary_connections">Есть</label>
            </div>
        </th>
        <th style="vertical-align: top; text-align: center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="builder_kr_substations" name="builder_kr_substations" @if( request()->input('builder_kr_substations')) checked @endif>
                <label class="form-check-label" for="builder_kr_substations">Есть</label>
            </div>
        </th>
        <th style="vertical-align: top; text-align: center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="builder_kr_lines" name="builder_kr_lines" @if( request()->input('builder_kr_lines')) checked @endif>
                <label class="form-check-label" for="builder_kr_lines">Есть</label>
            </div>
        </th>
        <th style="vertical-align: top; text-align: center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mounting_parts" name="mounting_parts" @if( request()->input('mounting_parts')) checked @endif>
                <label class="form-check-label" for="mounting_parts">Есть</label>
            </div>
        </th>
        <th style="vertical-align: top; text-align: center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rza" name="rza" @if( request()->input('rza')) checked @endif>
                <label class="form-check-label" for="rza">Есть</label>
            </div>
        </th>
        <th style="vertical-align: top; text-align: center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="asuptp" name="asuptp" @if( request()->input('asuptp')) checked @endif>
                <label class="form-check-label" for="asuptp">Есть</label>
            </div>
        </th>
        <th style="vertical-align: top; text-align: center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="askue" name="askue" @if( request()->input('askue')) checked @endif>
                <label class="form-check-label" for="askue">Есть</label>
            </div>
        </th>
        <th style="vertical-align: top; text-align: center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tm" name="tm" @if( request()->input('tm')) checked @endif>
                <label class="form-check-label" for="tm">Есть</label>
            </div>
        </th>
        <th style="vertical-align: top; text-align: center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="ss" name="ss" @if( request()->input('ss')) checked @endif>
                <label class="form-check-label" for="ss">Есть</label>
            </div>
        </th>
        <th style="vertical-align: top; text-align: center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="ktsb" name="ktsb" @if( request()->input('ktsb')) checked @endif>
                <label class="form-check-label" for="ktsb">Есть</label>
            </div>
        </th>

        <th style="vertical-align: top">
            <div>
                <input type="text" class="form-control" name="experience_110kv" placeholder="Поиск" value="{{ request()->input('experience_110kv') }}" />
            </div>
        </th>
        <th style="vertical-align: top">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="ready_to_work" name="ready_to_work" @if( request()->input('ready_to_work')) checked @endif>
                <label class="form-check-label" for="ready_to_work">Готов</label>
            </div>
        </th>

        <th style="vertical-align: top">
            <div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
            <div class="mt-2">
                <a href="{{ route('candidates.index') }}" type="submit" class="btn btn-secondary">Clear filters</a>
            </div>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($candidates as $index => $candidate)
        <tr>
            <td style="text-align: center">{{ $candidates->firstItem() + $index }}</td>
{{--            <td>{{ $candidate->id }}</td>--}}
            <td>
                <div style="font-weight: bold">
                    {{ $candidate->first_name }} {{ $candidate->middle_name }} {{ $candidate->last_name }}
                </div>
                <div>Пол: {{ mb_ucfirst($genders[$candidate->gender]) }}</div>
                <div>Место рождения: {{ $candidate->birth_place }}</div>
                <div>Гражданство: {{ $candidate->citizenship }}</div>
                <div>{{ $candidate->relocation_ready ? 'Готов к переезду' : 'Не готов к переезду' }}</div>
            </td>
            <td>
                @if (!empty($candidate->desiredPositions))
                    <ul style="padding-left: 1rem">
                    @foreach ($candidate->desiredPositions as $position)
                        <li>{{ $position->position }}</li>
                    @endforeach
                    </ul>
                @endif
                <div class="mt-2">
                    Желаемая ЗП: {{ number_format($candidate->salary, 2, ',', ' ') }}
                </div>
            </td>
            <td>
                @if (!empty($candidate->specializations))
                    <ul style="padding-left: 1rem">
                        @foreach ($candidate->specializations as $specialization)
                            <li>{{ $specialization->specialization }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>

            <td>
                <div><a href="mailto:{{ $candidate->email }}">{{ $candidate->email }}</a></div>
                <div><a href="tel:{{ $candidate->phone }}">{{ $candidate->phone }}</a></div>
            </td>

            <td style="text-align: center">{{ $candidate->rating }}</td>

            <td style="text-align: center">{{ ($candidate->primary_connections) ? 'Есть' : ''  }}</td>
            <td style="text-align: center">{{ ($candidate->builder_kr_substations) ? 'Есть' : '' }}</td>
            <td style="text-align: center">{{ ($candidate->builder_kr_lines) ? 'Есть' : '' }}</td>
            <td style="text-align: center">{{ ($candidate->mounting_parts) ? 'Есть' : '' }}</td>
            <td style="text-align: center">{{ ($candidate->rza) ? 'Есть' : '' }}</td>
            <td style="text-align: center">{{ ($candidate->asuptp) ? 'Есть' : '' }}</td>
            <td style="text-align: center">{{ ($candidate->askue) ? 'Есть' : '' }}</td>
            <td style="text-align: center">{{ ($candidate->tm) ? 'Есть' : '' }}</td>
            <td style="text-align: center">{{ ($candidate->ss) ? 'Есть' : '' }}</td>
            <td style="text-align: center">{{ ($candidate->ktsb) ? 'Есть' : '' }}</td>

            <td>{{ $candidate->experience_110kv }}</td>

            <td>{{ $candidate->ready_to_work ? 'Готов работать' : '' }}</td>
            <td>
                <div>
                    <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-primary">Edit</a>
                </div>
                <div class="mt-2">
                    <a onclick="confirmDelete(event, '{{ route('candidates.destroy', $candidate->id, ['id' => $candidate->id]) }}')" class="btn btn-danger">
                        Delete
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>