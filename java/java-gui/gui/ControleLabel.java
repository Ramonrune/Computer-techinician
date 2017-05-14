package gui;

import java.awt.Color;
import java.awt.Container;
import java.awt.FlowLayout;
import java.awt.Font;

import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JLabel;

public class ControleLabel extends JFrame{

	public ControleLabel(){
		super("Label");
		
		
		JLabel simples = new JLabel("Label simples");
		simples.setToolTipText("Meu ToolTip");
		
		Font fonte = new Font("serif", Font.BOLD | Font.ITALIC, 28);
		JLabel label = new JLabel("Label simples");
		label.setFont(fonte);
		label.setForeground(Color.BLUE);
		
		
		ImageIcon icon = new ImageIcon(getClass().getResource("lampada.png"));
		JLabel imagem = new JLabel(icon);
		
		
		Container c = getContentPane();
		c.setLayout(new FlowLayout());
		c.add(simples);
		c.add(label);
		c.add(imagem);
		
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(300, 300);
		setVisible(true);
	}
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		new ControleLabel();
	}

}
