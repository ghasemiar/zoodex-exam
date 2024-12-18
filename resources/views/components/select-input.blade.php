<div>
    <select name="{{ $name }}" id="{{ $id }}" class="{{ $class }}">
        <option value="{{null}}">{{ $placeholder }}</option>
        @foreach($options as $key => $value)
            <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
</div>
