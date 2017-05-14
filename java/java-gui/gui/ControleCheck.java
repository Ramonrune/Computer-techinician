package gui;

import java.awt.Container;
import java.awt.FlowLayout;
import java.awt.Font;
import java.awt.event.ItemEvent;
import java.awt.event.ItemListener;

import javax.swing.JCheckBox;
import javax.swing.JFrame;
import javax.swing.JTextField;

public class ControleCheck extends JFrame{

	JTextField texto;
	JCheckBox italico, bold;
	public ControleCheck() {
		super();
		texto = new JTextField("Veja a fonte mudar", 12);
		texto.setFont(new Font("Serif", Font.PLAIN, 26 ));
		
		
		bold = new JCheckBox("Bold");
		bold.addItemListener(new CheckBoxListener());
		italico = new JCheckBox("Italico");
		italico.addItemListener(new CheckBoxListener());
		Container c = getContentPane();
		c.setLayout(new FlowLayout());
		c.add(texto);
		c.add(bold);
		c.add(italico);
		
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(300, 300);
		setVisible(true);
		
	}
	

	class CheckBoxListener implements ItemListener{

		@Override
		public void itemStateChanged(ItemEvent e) {
			// TODO Auto-generated method stub
			
			if(bold.isSelected() && italico.isSelected()){
				texto.setFont(new Font("Serif", Font.BOLD | Font.ITALIC, 26));
			}
			else if(bold.isSelected()){
				texto.setFont(new Font("Serif", Font.BOLD, 26));
			}
			
			else if(italico.isSelected()){
				texto.setFont(new Font("Serif", Font.ITALIC, 26));
			}
			else{
				texto.setFont(new Font("Serif", Font.PLAIN, 26));
			}
			
		}
		
	}
	
	public static void main(String[] args) {
		new ControleCheck();

	}

}
