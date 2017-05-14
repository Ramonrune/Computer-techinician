package br.senai.sp.formulariocorreto;

import android.widget.EditText;
import android.widget.ImageView;
import android.widget.SeekBar;

/**
 * Created by B30 on 19/03/2015.
 */
class FomularioAssistente {

    private EditText nome;
    private EditText telefone;
    private EditText endereco;
    private EditText email;
    private SeekBar rank;
    private ImageView foto;
    private Cliente cliente;

    public FomularioAssistente(Formulario activity){

        this.nome = (EditText)activity.findViewById(R.id.nome1);
        this.telefone = (EditText)activity.findViewById(R.id.telefone);
        this.endereco = (EditText)activity.findViewById(R.id.endereco);
        this.email = (EditText)activity.findViewById(R.id.email);
        this.rank = (SeekBar)activity.findViewById(R.id.rank);
        this.foto = (ImageView)activity.findViewById(R.id.foto);
        this.cliente = new Cliente();

        ;
    }

    public Cliente pegaClienteFormulario(){
        cliente.setNome(nome.getText().toString());
        cliente.setTelefone(telefone.getText().toString());
        cliente.setEndereco(endereco.getText().toString());
        cliente.setEmail(email.getText().toString());
        cliente.setRank(Double.valueOf(rank.getProgress()));

        return cliente;
    }
}
