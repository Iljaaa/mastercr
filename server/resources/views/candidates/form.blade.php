@php

/**
 * @var \App\Models\DesiredPosition $desiredPositionsForSelect
 * @var \App\Models\Specialization $specializationsForSelect
 *
 * @var string $first_name
 * @var string $middle_name
 * @var string $last_name
 * @var string $gender
 * @var string $birth_place
 * @var string $citizenship
 * @var int $relocation_ready
 * @var int $salary
 * @var string $email
 * @var string $phone
 * @var int $rating
 * @var int $primary_connections
 * @var int $builder_kr_substations
 * @var int $builder_kr_lines
 * @var int $mounting_parts
 * @var int $rza
 * @var int $asuptp
 * @var int $askue
 * @var int $tm
 * @var int $ss
 * @var int $ktsb
 * @var string $experience_110kv
 * @var int $ready_to_work
 *
 * @var array $desired_positions
 * @var array $specializations
 */

$genders = __('messages.genders');

@endphp
<div class="container">
    <div class="row">
        <label for="first_name" class="col-2">Имя</label>
        <div class="col-sm-10 col-md-6">
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $first_name }}" maxlength="250">
            @error('first_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <label for="middle_name" class="col-2">Отчество</label>
        <div class="col-sm-10 col-md-6">
            <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ $middle_name }}" maxlength="250">
            @error('middle_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <label for="last_name" class="col-2">Фамилия</label>
        <div class="col-sm-10 col-md-6">
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $last_name }}" maxlength="250">
            @error('last_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <label for="gender" class="col-2">Пол</label>
        <div class="col-sm-10 col-md-6">
            <select name="gender" id="gender" class="form-control">
                @foreach(\App\Domain\Gender::getValue() as $v)
                    <option value="{{ $v }}" @if($gender == $v) selected @endif>{{ mb_ucfirst($genders[$v]) }}</option>
                @endforeach
            </select>
            @error('gender')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <label for="birth_place" class="col-2">Место рождения</label>
        <div class="col-sm-10 col-md-6">
            <input type="text" name="birth_place" id="birth_place" class="form-control" value="{{ $birth_place }}" maxlength="250">
            @error('birth_place')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <label for="citizenship" class="col-2">Гражданство</label>
        <div class="col-sm-10 col-md-6">
            <input type="text" name="citizenship" id="citizenship" class="form-control" value="{{ $citizenship }}" maxlength="250">
            @error('citizenship')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-10 col-md-6 offset-md-2">
            <div style="padding-left: 20px">
                <input class="form-check-input" type="checkbox" name="relocation_ready" value="1" id="relocation_ready" @if($relocation_ready) checked @endif>
                <label class="form-check-label" for="relocation_ready">
                    Готовность к переезду
                </label>
            </div>

            @error('relocation_ready')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mt-6" style="margin-top: 10px">
        <div class="form-group">
            <label for="desired_positions">Желаемая должность</label>

            @foreach($desiredPositionsForSelect as $position)
                @php ($id = 'ch_desired_position_'.$position->id)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $position->id }}" id="{{ $id }}" name="desired_positions[]" @if(in_array($position->id, $desired_positions)) checked @endif>
                    <label class="form-check-label" for="{{ $id }}">{{ $position->position }}</label>
                </div>
            @endforeach

        </div>
    </div>

    <div class="row mt-4">
        <label for="salary" class="col-3">Желаемая зарплата</label>
        <div class="col-sm-10 col-md-5">
            <input type="text" name="salary" id="salary" class="form-control" value="{{ $salary }}" style="max-width: 200px">
            @error('salary')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="specializations">Специализации</label>

        @foreach($specializationsForSelect as $specialization)
            @php ($id = 'ch_specialization_'.$specialization->id)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $specialization->id }}" id="{{ $id }}" name="specializations[]" @if(in_array($specialization->id, $specializations)) checked @endif>
                <label class="form-check-label" for="{{ $id }}">{{ $specialization->specialization }}</label>
            </div>
        @endforeach

        @error('specializations')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

{{--        <select multiple class="form-control" id="specializations" name="specializations[]" style="height: 200px">--}}
{{--            @foreach($specializationsForSelect as $specialization)--}}
{{--                <option value="{{ $specialization->id }}" @if(in_array($specialization->id, $specializations)) selected @endif>{{ $specialization->specialization }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
    </div>

    <div class="row mt-2">
        <label for="email" class="col-2">Почта</label>
        <div class="col-sm-10 col-md-6">
            <input type="email" name="email" id="email" class="form-control" value="{{ $email }}" maxlength="250">
            @error('email')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <label for="phone" class="col-2">Телефон</label>
        <div class="col-sm-10 col-md-6">
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $phone }}" maxlength="250">
            @error('phone')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mt-4">
        <label for="rating" class="col-4">Оценка по 10-бальной системе</label>
        <div class="col-sm-10 col-md-8">
            <input type="number" name="rating" id="rating" class="form-control" min="0" max="10" value="{{ $rating }}" style="max-width: 100px">
            @error('rating')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="row mt-2">
        <label for="ready_to_work" class="col-4">Готовность работать</label>
        <div class="col-sm-10 col-md-4">
            <select class="form-control " id="ready_to_work" name="ready_to_work">
                <option>-</option>
                <option value="1" @if($ready_to_work == 1) selected @endif>Да</option>
                <option value="0" @if($ready_to_work == 0) selected @endif>Нет</option>
            </select>
        </div>
    </div>

    {{-- Checkboxes block --}}
    <div class="form-group mt-4">
        <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="primary_connections" id="primary_connections" @if($primary_connections) checked @endif>
            <label class="form-check-label" for="primary_connections">Первичные соединения по подстанциям 110кВ и выше</label>
        </div>
        @error('primary_connections')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="builder_kr_substations" id="builder_kr_substations" @if($builder_kr_substations) checked @endif>
            <label class="form-check-label" for="builder_kr_substations">Строитель разработка разделов КР по подстанциям</label>
        </div>
        @error('builder_kr_substations')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="builder_kr_lines" id="builder_kr_lines" @if($builder_kr_lines) checked @endif>
            <label class="form-check-label" for="builder_kr_lines">Строитель разработка КР по линиям 110 кВ</label>
        </div>
        @error('builder_kr_lines')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="mounting_parts" id="mounting_parts" @if($mounting_parts) checked @endif>
            <label class="form-check-label" for="mounting_parts">Монтажные части линии, расстановка опор</label>
        </div>
        @error('mounting_parts')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="rza" id="rza" @if($rza) checked @endif>
            <label class="form-check-label" for="rza">Релейная защита и автоматика (РЗА)</label>
        </div>
        @error('rza')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="asuptp" id="asuptp" @if($asuptp) checked @endif>
            <label class="form-check-label" for="asuptp">Автоматизированная система управления технологическим процессом (АСУТП)</label>
        </div>
        @error('asuptp')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="askue" id="askue" @if($askue) checked @endif>
            <label class="form-check-label" for="askue">Автоматизированная система контроля и учёта электроэнергии (АСКУЭ)</label>
        </div>
        @error('askue')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="tm" id="tm" @if($tm) checked @endif>
            <label class="form-check-label" for="tm">Телемеханика (ТМ)</label>
        </div>
        @error('tm')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="ss" id="ss" @if($ss) checked @endif>
            <label class="form-check-label" for="ss">Средства связи (СС)</label>
        </div>
        @error('ss')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="ktsb" id="ktsb" @if($ktsb) checked @endif>
            <label class="form-check-label" for=""ktsb>Комплекс техниских средств безопасности (КТСБ)</label>
        </div>
        @error('ktsb')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="experience_110kv">Есть ли у Вас опыт проектирования на подстанциях и воздушных линиях 110кВ?</label>
        <input type="text" class="form-control" id="experience_110kv" name="experience_110kv" placeholder="" value="{{ $experience_110kv }}" maxlength="250">
        @error('experience_110kv')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>

</div>