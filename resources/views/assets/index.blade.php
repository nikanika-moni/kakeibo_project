@extends('layouts.admin')
@section('content')
    <div>
    @if ($savingsGoal)
        <h1>設定した目標を表示</h1>
        <h1>{{ $savingsAmount }}円</h1>
    @else
        <button class="add-label-btn" onclick="openModal()">目標を設定する</button>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <form id="" action="{{ route('assets.create',['userId' => $userId]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="savings">毎月の目標貯蓄額</label>
                        <input type="number" id="savings" name="savings">
                        <!-- <label for="savings_goal">臨時収入（ボーナス）の目標貯蓄額</label> -->
                        <!-- <div class="sub-item">
                            <label for="frequency">回数/年</label>
                            <select id="frequency" name="frequency">
                                <option value="">選択してください</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div> -->
                            <!-- <div class="horizontal-sub-items" id="itemTemplate">
                                <div class="sub-item">
                                    <select id="subject_month" name="subject_month[]">
                                        <option value="">選択してください</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="3">4</option>
                                        <option value="3">5</option>
                                        <option value="3">6</option>
                                        <option value="3">7</option>
                                        <option value="3">8</option>
                                        <option value="3">9</option>
                                        <option value="3">10</option>
                                        <option value="3">11</option>
                                        <option value="3">12</option>
                                    </select>
                                    <label for="subject_month">月</label>
                                </div>
                                <div class="sub-item">
                                    <input type="number" id="subject_reward" name="number-subject_reward">
                                    <label for="subject_reward">円</label>
                                </div>
                            </div> -->
                    </div>
                    <button type="submit">追加する</button>
                </form>
                <div id="dropdown-container"></div>
            </div>
        </div>
    @endif
    </div>


    <script>
        const userId = {{ $userId }};
    </script>
        <script src="/js/label_modal.js"></script>
@endsection
