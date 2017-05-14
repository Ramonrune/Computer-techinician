package gui;

import java.awt.BorderLayout;
import java.awt.Container;
import java.awt.Font;
import java.awt.event.ItemEvent;
import java.awt.event.ItemListener;

import javax.swing.ImageIcon;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;

public class ControleCombo extends JFrame implements ItemListener{

	
	JComboBox<String> combo;
	JLabel label;
	ImageIcon[] imagens = {
			new ImageIcon(getClass().getResource("home.png")),
			new ImageIcon(getClass().getResource("mensagens.png")),
			new ImageIcon(getClass().getResource("profile.jpg")),
			new ImageIcon(getClass().getResource("search.png"))
	};
	
	public ControleCombo(){
		super("Album de fotos");
		
		Container c = getContentPane();
		
		combo = new JComboBox<String>();
		combo.setFont(new Font("Serif", Font.PLAIN, 26));
		combo.addItem("Home");
		combo.addItem("Mensagens");
		combo.addItem("Perfil");
		combo.addItem("Pesquisa");
		combo.addItemListener(this);
		
		label = new JLabel(imagens[0]);
		
		c.add(BorderLayout.NORTH, combo);
		c.add(BorderLayout.CENTER, label);
		
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(300, 530);
		setVisible(true);
	}
	
	@Override
	public void itemStateChanged(ItemEvent e) {
		// TODO Auto-generated method stub
		if(e.getStateChange() == ItemEvent.SELECTED){
			label.setIcon(imagens[combo.getSelectedIndex()]);
		}
	}
	
	public static void main(String[] args) {
		new ControleCombo();
	}

	
}
