

        <div class="row ">
          <div class="col l7 s12 m7">
          <div class="row ">
            <div class="col s12">
              <h6>Parcela</h6>
            </div>
            <div class="input-field col l4 s12 m4">
                <input name="n_nf" {{isset($disabled)? 'disabled' : ''}} value="{{isset($financial)? $financial->n_nf : ''}}" type="text" class="validate">
                <label>Nº NF</label>
            </div>
            <div class="input-field col l4 s12 m4">
                <input name="emission" {{isset($disabled)? 'disabled' : ''}} value="{{isset($financial)? $financial->emission : ''}}" type="text" class="datepicker">
                <label>Emissão</label>
            </div>
            <div class="input-field col l4 s12 m4">
                <input class="money" name="total_value" {{isset($disabled)? 'disabled' : ''}} value="{{isset($financial)? $financial->total_value : ''}}" type="text" class="validate">
                <label>Valor total</label>
            </div>

          </div>
        </div>
        <div class="input-field col s1">
        </div>
        <div class="col l4 s12 m4">
        <div class="row ">
          <div class="col s12">
            <h6>Tributos</h6>
          </div>
            <div class="input-field col l5 s12 m4">
                <input name="dam_iss" {{isset($disabled)? 'disabled' : ''}} value="{{isset($financial)? $financial->dam_iss : ''}}" type="text" class="validate">
                <label>DAM ISS</label>
            </div>
            <div class="input-field col l5 s12 m4">
                <input name="ir" {{isset($disabled)? 'disabled' : ''}} value="{{isset($financial)? $financial->ir : ''}}" type="text" class="validate">
                <label>IR</label>
            </div>

          </div>
          </div>


          <div class="row ">
            <div class="col l7 s12 m7">
            <div class="row ">
              <div class="col s12">
                <h6>ING. CONTRAP.</h6>
              </div>
              <div class="input-field col l4 s12 m4">
              <input class="money" name="vlr" {{isset($disabled)? 'disabled' : ''}} value="{{isset($financial)? $financial->vlr : ''}}" type="text" class="validate">
                <label>VLR</label>
            </div>

        <div class="input-field col l4 s12 m4">
                <input class="money" name="ted_value" {{isset($disabled)? 'disabled' : ''}} value="{{isset($financial)? $financial->ted_value : ''}}" type="text" class="validate">
                <label>Valor do TED</label>
            </div>

            <div class="input-field col l4 s12 m4">
                <input name="ted_date" {{isset($disabled)? 'disabled' : ''}} value="{{isset($financial)? $financial->ted_date : ''}}" type="text" class="datepicker">
                <label>Data do TED </label>
            </div>
          </div>
        </div>



        <div class="input-field col s1">
        </div>
        <div class="col l4 s12 m4">
        <div class="row ">
          <div class="col s12">
            <h6>Relatórios</h6>
          </div>
            <div class="input-field col l5 s12 m4">
                <input name="pr" {{isset($disabled)? 'disabled' : ''}} value="{{isset($financial)? $financial->pr : ''}}" type="text" class="validate">
                <label>PR</label>
            </div>
            <div class="input-field col l5 s12 m4">
                <input name="dli" {{isset($disabled)? 'disabled' : ''}} value="{{isset($financial)? $financial->dli : ''}}" type="text" class="validate">
                <label>DLI</label>
            </div>
          </div>
        </div>
      </div>
