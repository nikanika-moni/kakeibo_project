@extends('layouts.admin')
@section('content')
<div class="container">
    <div>
        <button class="add-label-btn" onclick="openModal()">ラベルを追加する</button>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>

                <form id="" action="{{ route('record.add_label',['userId' => $userId, 'year' => $year, 'month' => $month, 'day' => $day]) }}" method="POST">
                    @csrf
                    <select id="spending_category" name="spending_category_id" required>
                        <option value="select-def" disabled selected>選択してください</option>
                        @foreach($spending_categories as $spending_category)
                            <option value="{{ $spending_category->id }}">
                                {{ $spending_category->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit">追加する</button>
                </form>

                <div id="dropdown-container"></div>
            </div>
        </div>
    </div>
    <form id="entryForm" action="{{ route('record.add_spending', ['userId' => $userId, 'year' => $year, 'month' => $month, 'day' => $day]) }}" method="POST">
    @csrf
        @foreach($spending_label_intermediate as $label)
            <div class="input-block">
                <label for="amount">{{ $label->spending_category->name }}:</label>
                <input type="number" id="amount" name="amounts[]" placeholder="金額を入力してください" required>
                <label for="memo">メモ:</label>
                <textarea id="memo" name="memos[]" placeholder="メモを入力してください"></textarea>
                <input type="hidden" name="spending_label_intermediate_ids[]" value="{{ $label->id }}">
            </div>
        @endforeach
        <button type="submit">計上する</button>
    </form>


</div>

    <script src="/js/label_modal.js"></script>
    <!-- <script src="/js/spending_label.js"></script> -->
@endsection

