package br.senai.sp.aplicacao2;

import android.media.Image;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.SeekBar;

/**
 * Created by B30 on 10/03/2015.
 */
public class FormularioAssistente {
    private EditText nome;
    private EditText telefone;
    private EditText endereco;
    private EditText email;
    private SeekBar rank;
    private ImageView foto;
    private cliente cliente;

    public FormularioAssistente(formulario activity){
        this.cliente = new cliente();
        this.nome = (EditText) activity.findViewById(R.id.nome);
        this.telefone = (EditText) activity.findViewById(R.id.telefone);
        this.endereco = (EditText) activity.findViewById(R.id.endereco);
        this.email = (EditText) activity.findViewById(R.id.email);
        this.rank = (SeekBar) activity.findViewById(R.id.seekBar);
        this.foto = (ImageView) activity.findViewById(R.id.imageView);
    }


    public cliente pegaClienteFormulario(){
        cliente.setNome(nome.getText().toString());
        cliente.setTelefone(telefone.getText().toString());
        cliente.setEndereco(endereco.getText().toString());
        cliente.setEmail(email.getText().toString());
        cliente.setRank(Double.valueOf(rank.getProgress()));

        return cliente;

    }
public void colocaNoFormulario(cliente cliente){
    nome.setText(cliente.getNome());
    telefone.setText(cliente.getTelefone());
    endereco.setText(cliente.getEndereco());
    email.setText(cliente.getEmail());
    rank.setProgress(cliente.getRank().intValue());
    this.cliente = cliente;


}


}
