        <div class="row ">
            <div class="input-field col l3 s12 m4">
                <input {{isset($disabled)? 'disabled' : ''}} name="parcel" value="{{isset($transfer)? $transfer->parcel : ''}}" placeholder="Informe a parcela" type="text" class="validate">
                <label>Parcela</label>
            </div>
            <div class="input-field col l3 s12 m4">
                <input class="money" {{isset($disabled)? 'disabled' : ''}} name="amount_received" value="{{isset($transfer)? $transfer->amount_received : ''}}" placeholder="Informe o valor recebido" type="text" class="validate">
                <label>Valor Recebido</label>
            </div>
            <div class="input-field col l3 s12 m4">
                <input {{isset($disabled)? 'disabled' : ''}} name="status" value="{{isset($transfer)? $transfer->status : ''}}" placeholder="Informe o status" type="text" class="validate">
                <label>Status</label>
            </div>
            <div class="input-field col l3 s12 m4">
                <input {{isset($disabled)? 'disabled' : ''}} name="inclusion_date" value="{{isset($transfer)? $transfer->inclusion_date : ''}}" placeholder="Informe a data da inclusão" type="text" class="datepicker">
                <label>Data da Inclusão</label>
            </div>
            <div class="input-field col l3 s12 m4">
                <input {{isset($disabled)? 'disabled' : ''}} name="ob_number" value="{{isset($transfer)? $transfer->ob_number : ''}}" placeholder="Informe o número da OB" type="text" class="validate">
                <label>Número da OB</label>
            </div>
            <div class="input-field col l3 s12 m4">
                <input {{isset($disabled)? 'disabled' : ''}} name="ob_date" value="{{isset($transfer)? $transfer->ob_date : ''}}" placeholder="Informe a Data da OB" type="text" class="datepicker">
                <label>Data da OB</label>
            </div>
            <div class="input-field col l3 s12 m4">
                <input class="money" {{isset($disabled)? 'disabled' : ''}} name="value_rec" value="{{isset($transfer)? $transfer->value_rec : ''}}" placeholder="Informe o Vlr Rec" type="text" class="validate">
                <label>Vlr Rec</label>
            </div>
            <div class="input-field col l3 s12 m4">
                <input class="money" {{isset($disabled)? 'disabled' : ''}} name="value_paid" value="{{isset($transfer)? $transfer->value_paid : ''}}" placeholder="Informe o Vlr Pago" type="text" class="validate">
                <label>Vlr Pago</label>
            </div>
        </div>
