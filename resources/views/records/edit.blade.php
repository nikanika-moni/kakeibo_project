@extends('layouts.admin')
@section('content')
<form id="entryForm" action="{{ route('record.update_spending', ['userId' => $userId, 'year' => $year, 'month' => $month, 'day' => $day, 'record_details' => $record_details->first()->id]) }}" method="POST">
    @csrf
    @method('PUT')
        @foreach($spending_label_intermediate as $label)
            @php
                // $record_details から具体的なレコードを取得
                $currentRecord = $record_details->where('spending_label_intermediate_id', $label->id)->first();
            @endphp
            <div class="input-block">
            <label for="amount">{{ $label->spending_category->name }}:</label>
            <input type="number" id="amount" name="amounts[]" value="{{ old('amount', $currentRecord->amount ?? '') }}" required>
            <label for="memo">メモ:</label>
            <textarea id="memo" name="memos[]">{{ old('memo', $currentRecord->memo ?? '') }}</textarea>
        </div>
        @endforeach
        <button type="submit">計上する</button>
    </form>
    <script src="/js/label_modal.js"></script>
    <!-- <script src="/js/spending_label.js"></script> -->
@endsection
