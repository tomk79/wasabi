@extends('layouts.app')
@section('title', '新規グループを作成')

@section('content')
<div class="container">

	<form action="{{ url('settings/groups/create') }}" method="post">
		@csrf
		@method('POST')

		<table class="table table__dd">
			<tbody>
				<tr>
					<th><label for="name">グループ名</label></th>
					<td>
						<input id="name" type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" name="name" value="{{ old('name') }}" required autofocus>
							@if ($errors->has('name'))
								<span class="invalid-feedback" role="alert">
									{{ $errors->first('name') }}
								</span>
							@endif
					</td>
				</tr>
				<tr>
					<th><label for="account">アカウント名</label></th>
					<td>
						<input id="account" type="text" class="form-control @if ($errors->has('account')) is-invalid @endif" name="account" value="{{ old('account') }}" required autofocus>
							@if ($errors->has('account'))
								<span class="invalid-feedback" role="alert">
									{{ $errors->first('account') }}
								</span>
							@endif
					</td>
				</tr>
				<tr>
					<th><label for="description">説明</label></th>
					<td>
						<input id="description" type="text" class="form-control @if ($errors->has('description')) is-invalid @endif" name="description" value="{{ old('description') }}" autofocus>
							@if ($errors->has('description'))
								<span class="invalid-feedback" role="alert">
									{{ $errors->first('description') }}
								</span>
							@endif
					</td>
				</tr>
			</tbody>
		</table>

		<button type="submit" name="submit" class="btn btn-primary">グループを作成する</button>
	</form>

	<hr />
	<div class="text-right">
		<a href="{{ url('settings/groups/') }}" class="btn btn-default">キャンセル</a>
	</div>

</div>
@endsection
