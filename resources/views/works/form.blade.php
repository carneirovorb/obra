        <div class="row ">
            <div class="input-field col l6 s12 m4">
                <input name="name" required="required" {{isset($disabled)? 'disabled' : ''}} placeholder="Informe o título da obra" id="obra_title" value="{{isset($work)? $work->name : ''}}" type="text" class="validate">
                <label>Obra</label>
            </div>

            <div class="input-field inline  col l2 s12 m4">
                <input name="position" {{isset($disabled)? 'disabled' : ''}} id="n_proposta" value="{{isset($work)? $work->position : ''}}" type="text" class="datepicker">
                <label>Posição</label>
            </div>

            <div class="input-field inline  col l2 s12 m4">
                <input name="year" type="text" class="validate" {{isset($disabled)? 'disabled' : ''}}  value="{{isset($work)? $work->year : '2017'}}">
                <label>Ano</label>
            </div>
        </div>

        <div class="row">

            <div class="input-field inline  col l2 s12 m4">
                <input name="propose_number" {{isset($disabled)? 'disabled' : ''}}  value="{{isset($work)? $work->propose_number : ''}}" type="text" class="validate">
                <label>Nº da proposta</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="account_repass" {{isset($disabled)? 'disabled' : ''}} id="repasse" value="{{isset($work)? $work->account_repass : ''}}"  type="text" class="validate">
                <label>Cont. de Repasse</label>
            </div>


            <div class="input-field inline col l3 s12 m4">
                <input name="action" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->action : ''}}" id="action" type="text" class="validate">
                <label>Programa/Ação</label>
            </div>

            <div class="input-field inline col l4 s12 m4">
                <input name="object" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->object : ''}}" id="obj" type="text" class="validate">
                <label>Objeto</label>
            </div>


            <div class="input-field inline col l2 s12 m4">
                <input name="organ" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->organ : ''}}" id="orgao" type="text" class="validate">
                <label>Orgão</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="value" {{isset($disabled)? 'disabled' : ''}} type="text" value="{{isset($work)? $work->value : ''}}" class="money validate">
                <label>Valor</label>
            </div>


            <div class="input-field inline col l2 s12 m4">
                <input name="convain_vigence" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->convain_vigence : ''}}" id="n_proposta" type="text" class="datepicker">
                <label>Vigência do Convênio</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="repass_value" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->repass_value : ''}}"  type="text" class="money validate">
                <label>Valor do Repasse</label>
            </div>


            <div class="input-field inline col l1 s12 m4">
                <input class="percent" name="execution_fis" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->execution_fis : ''}}" id="fis" type="text" class="validate">
                <label>EX.FIS.</label>
            </div>

            <div class="input-field inline col l1 s12 m4">
                <input class="percent" name="execution_finan" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->execution_finan : ''}}" id="finan" type="text" class="validate">
                <label>EX.FINAN.</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="licitation_number" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->licitation_number : ''}}" id="licitacao" type="text" class="validate">
                <label>Nº da licitação</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="spreadsheet_winner"  {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->spreadsheet_winner : ''}}" type="text" class="validate money">
                <label>Planilha Vencedora</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="edital_publication" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->edital_publication : ''}}" id="pub_edital" type="text" class="datepicker">
                  <label>Publicação do Edital</label>
            </div>


            <div class="input-field inline col l2 s12 m4">
                <input name="homologation" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->homologation : ''}}" id="homologacao" type="text" class="datepicker">
                <label>Homologação</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="adjudication" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->adjudication : ''}}" id="adjudicao" type="text" class="datepicker">
                <label>Adjudição</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="declaration" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->declaration : ''}}" id="declaracoes" type="text" class="validate">
                <label>Declarações</label>
            </div>


            <div class="input-field inline col l2 s12 m4">
                <input name="convain_publication" {{isset($disabled)? 'disabled' : ''}} id="pub" value="{{isset($work)? $work->convain_publication : ''}}" type="text" class="datepicker">
                <label>Publicação do Convenio</label>
            </div>


            <div class="input-field inline col l2 s12 m4">
                <input  name="ult_medition" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->ult_medition : ''}}" id="ultmedicao" type="text" class="datepicker">
                <label>Ult. Medição</label>
            </div>

            <div class="input-field inline col l2 s12 m4">

                <div id="prefectureSelect">
                    <select id="" name="prefecture_id" {{isset($disabled)? 'disabled' : ''}}>
                        <option value="" selected disabled>Prefeitura</option>
                        @foreach($prefectures as $prefecture)
                            <option value="{{$prefecture->id}}" {{(isset($work) && $work->prefecture_id == $prefecture->id)? 'selected' : ''}}>{{$prefecture->name}}</option>    
                        @endforeach                               
                    </select>
                </div>
               
                <div style="display:none;" id="newPrefecture">
                <input  name="prefectureNew" {{isset($disabled)? 'disabled' : ''}} type="text" class="">
                <label>Nova Prefeitura</label>  
                </div>              
            
                
            </div>
            @if (!isset($disabled))
                <div class="input-field inline col">
                    <br>
                    <a onclick="addPrefecture()" class="waves-effect waves-dark left add tooltipped" data-delay="0" data-tooltip="Nova Prefeitura"><i class="material-icons ">add</i></a>
                </div>
            @endif
            <div class="input-field col l2 s12 m4">
                <select name="bond" {{isset($disabled)? 'disabled' : ''}}>
                    <option value="" selected disabled>Vínculo</option>
                    <option value="SIMEC" {{(isset($work) && $work->bond === 'SIMEC')? 'selected' : ''}}>SIMEC</option>
                    <option value="SISMOB" {{(isset($work) && $work->bond === 'SISMOB')? 'selected' : ''}}>SISMOB</option>
                    <option value="CAIXA" {{(isset($work) && $work->bond === 'CAIXA')? 'selected' : ''}}>CAIXA</option>
                    <option value="CONDER" {{(isset($work) && $work->bond === 'CONDER')? 'selected' : ''}}>CONDER</option>
                    <option value="ESCRITÓRIO" {{(isset($work) && $work->bond === 'ESCRITÓRIO')? 'selected' : ''}}>ESCRITÓRIO</option>
                    <option value="OUTRO" {{(isset($work) && $work->bond === 'OUTRO')? 'selected' : ''}}>OUTRO</option>
                </select>
            </div>


            <div class="input-field col l2 s12 m4">
                <select name="type_work" {{isset($disabled)? 'disabled' : ''}}>
                    <option value="" selected disabled>Tipo de Obra</option>
                    <option value="Pavimentação de Rua" {{(isset($work) && $work->type_work === 'Pavimentação de Rua')? 'selected' : ''}}>Pavimentação de Rua</option>
                    <option value="Residencial" {{(isset($work) && $work->type_work === 'Residencial')? 'selected' : ''}}>Residencial</option>
                    <option value="Quadra" {{(isset($work) && $work->type_work === 'Quadra')? 'selected' : ''}}>Quadra</option>
                    <option value="Cobertura" {{(isset($work) && $work->type_work === 'Cobertura')? 'selected' : ''}}>Cobertura</option>
                    <option value="Outro" {{(isset($work) && $work->type_work === 'Outro')? 'selected' : ''}}>OUTRO</option>
                </select>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="input-field inline col l2 s12 m4">
                <input name="contract" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->contract : ''}}" type="text" class="validate">
                <label>Contrato</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="company" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->company : ''}}" id="empresa" type="text" class="validate">
                <label> Empresa</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="cnpj" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->cnpj : ''}}" class="cnpj" type="text" class="validate">
                <label>CNPJ</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="assignature_date" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->assignature_date : ''}}" id="data_assin" type="text" class="datepicker">
                <label>Data da Assinatura</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="vigence_company" id="vigencia" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->vigence_company : ''}}" type="text" class="datepicker">
                  <label>Vigência</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="term_additive" {{isset($disabled)? 'disabled' : ''}} id="prazo_aditivo" value="{{isset($work)? $work->term_additive : ''}}" type="text" class="datepicker">
                <label>Aditivo de Prazo</label>
            </div>

            <div class="input-field col l3 s12 m4">
                <select name="status_contract" {{isset($disabled)? 'disabled' : ''}}>
                    <option value="" selected isabled>Situação do contrado</option>
                    <option value="Normal" {{(isset($work) && $work->status_contract === 'Normal')? 'selected' : ''}}>Normal</option>
                    <option value="Prestado Contas" {{(isset($work) && $work->status_contract === 'Prestado Contas')? 'selected' : ''}}>Prestado Contas</option>
                    <option value="TCE" {{(isset($work) && $work->status_contract === 'TCE')? 'selected' : ''}}>TCE</option>
                </select>
            </div>

        </div>

        <div class="row">
            <h6>Detalhes do Convênio</h6>

            <div class="input-field inline col l2 s12 m4">
                <input name="siconv" id="siconv" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->siconv : ''}}" type="text" class="validate">
                <label>SICONV</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="siafi" type="text" class="validate" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->siafi : ''}}">
                <label>SIAFI</label>
            </div>

            <div class="input-field inline col l3 s12 m4">
                <select name="status" {{isset($disabled)? 'disabled' : ''}}>
                    <option value="" selected disabled>Situação</option>
                    <option value="Em Execução" {{(isset($work) && $work->status === 'Em Execução')? 'selected' : ''}}>Em execução</option>
                    <option value="Parado" {{(isset($work) && $work->status === 'Parado')? 'selected' : ''}}>Parado</option>
                    <option value="Finalizado" {{(isset($work) && $work->status === 'Finalizado')? 'selected' : ''}}>Finalizado</option>
                </select>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="original_number" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->original_number : ''}}" type="text" class="validate">
                <label>Nº Original</label>
            </div>

            <div class="input-field inline col l3 s12 m4">
                <input name="super_organ" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->super_organ : ''}}" type="text" class="validate">
                <label>Orgão Superior</label>
            </div>

            <div class="input-field inline col l3 s12 m4">
                <input name="grantor" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->grantor : ''}}" type="text" class="validate">
                <label>Concedente</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="value_free" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->value_free : ''}}" type="text" class="money validate">
                <label>Valor Liberado</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="publication" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->publication : ''}}" type="text" class="datepicker">
                <label>Publicação</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="vigence_init" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->vigence_init : ''}}" type="text" class="datepicker">
                <label>Início da Vigência</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="vigence_end" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->vigence_end : ''}}" type="text" class="datepicker">
                <label>Fim da Vigência</label>
            </div>

            <div class="input-field inline col l2 s12 m4">
                <input name="counterpart_value" {{isset($disabled)? 'disabled' : ''}} value="{{isset($work)? $work->counterpart_value : ''}}" type="text" class=" money validate">
                <label>Valor Contrapartida</label>
            </div>

        </div>
