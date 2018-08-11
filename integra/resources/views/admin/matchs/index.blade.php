@extends('admin.layouts.partials.app')

@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2 col-xs-12">

                <div class="panel panel-default">

                <div class="panel-heading">Matchs

                </div>

                <div class="panel-body">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th>Aluno</th>

                                <th>Email</th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse ($matches as $match)

                            <tr>

                                @forelse ($alunos as $aluno)

                                    @if($aluno->id == $match->id_aluno)

                                        <td>{{ $aluno->name }}</td>

                                        <td>{{ $aluno->email }}</td>

                                    @endif

                                @empty



                                @endforelse

                                <td></td>

                                <td>

                                    

                                </td>

                                

                                <td></td>

                            </tr>

                            @empty



                            @endforelse

                        </tbody>

                    </table>

                    {{ $matches->links() }}

                </div>

            </div>

            </div>

    </div>



@endsection







