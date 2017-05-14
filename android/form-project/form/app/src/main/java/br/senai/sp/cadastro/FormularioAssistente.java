package br.senai.sp.cadastro;

import android.widget.EditText;
import android.widget.ImageView;
import android.widget.SeekBar;

/**
 * Created by B30 on 12/03/2015.
 */
public class FormularioAssistente {
    private EditText nome;
    private EditText telefone;
    private EditText endereco;
    private EditText email;
    private SeekBar seekBar;
    private ImageView foto;
    private Mcliente cliente;

    public FormularioAssistente (Formulario activity){
        this.cliente = new Mcliente();
        this.nome = (EditText) activity.findViewById(R.id.editNome);
        this.telefone = (EditText) activity.findViewById(R.id.editTelefone);
        this.endereco = (EditText) activity.findViewById(R.id.editEndereco);
        this.email = (EditText) activity.findViewById(R.id.editEmail);
        this.seekBar = (SeekBar) activity.findViewById(R.id.seekBar);
        this.foto = (ImageView) activity.findViewById(R.id.imageView);
    }

    public Mcliente pegaClienteFormulario(){ //Para a classe Mcliente, irá ser executado o método pegaClienteFormulario()
        cliente.setNome(nome.getText().toString());
        cliente.setTelefone(telefone.getText().toString());
        cliente.setEndereço(endereco.getText().toString());
        cliente.setEmail(email.getText().toString());
        cliente.setSeekBar(Double.valueOf(seekBar.getProgress()));

        return cliente;
    }
}
