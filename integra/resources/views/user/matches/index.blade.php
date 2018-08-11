@extends('layouts.partials-user.app')

@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">

                <div class="panel-heading">Matchs

                </div>

                <div class="panel-body">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th>Empresa</th>

                                <th>Email</th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse ($matches as $match)

                            <tr>

                                @forelse ($empresas as $empresa)

                                    @forelse ($oportunidades as $oportunidade)

                                        @if($oportunidade->id == $match->id_oportunidade && $oportunidade->id_empresa == $empresa->id)

                                            <td>{{ $empresa->name }}</td>

                                            <td>{{ $empresa->email }}</td>

                                        @endif

                                    @empty

                                @endforelse



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







