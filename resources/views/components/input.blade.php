<div class="flex flex-col gap-2">
    <label for="{{$attributes['name']}}" class="text-sm text-gray-700 font-semibold">{{$attributes['label']}}</label>
    <input value="{{ old($attributes['name']) }}" type="{{$attributes['type']}}" name="{{$attributes['name']}}" class="border p-2 focus:outline-none focus:border-2 focus:border-gray-400 rounded-lg">
    @error($attributes['name'])
    <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
</div>
