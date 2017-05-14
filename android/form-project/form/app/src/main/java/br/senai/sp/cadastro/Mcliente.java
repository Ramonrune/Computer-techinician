package br.senai.sp.cadastro;

/**
 * Essa classe servirá como MODEL
 */
public class Mcliente {

    /* Declarando os objetos do tipo long, string e double */
    private Long id;
    private String nome;
    private String telefone;
    private String endereco;
    private String email;
    private String caminhoFoto;
    private Double seekBar; /* barra para dar "nota" ao cliente - seekBar*/

    /* O método abaixo é usado para sobrescrever o método padrão da classe object */

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getEndereco() {
        return endereco;
    }

    public void setEndereço(String endereco) {
        this.endereco = endereco;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getCaminhoFoto() {
        return caminhoFoto;
    }

    public void setCaminhoFoto(String caminhoFoto) {
        this.caminhoFoto = caminhoFoto;
    }

    public Double getSeekBar() {
        return seekBar;
    }

    public void setSeekBar(Double seekBar) {
        this.seekBar = seekBar;
    }

    public String getTelefone() {
        return telefone;
    }

    public void setTelefone(String telefone) {
        this.telefone = telefone;
    }

    public String toString(){
        return id + " - " + nome;
    }
}
