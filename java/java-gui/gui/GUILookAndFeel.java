package gui;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.UIManager;
import javax.swing.border.EmptyBorder;
import javax.swing.UIManager.*;
import javax.swing.JButton;
import javax.swing.JRadioButton;
import javax.swing.JTextArea;
import javax.swing.JLabel;
public class GUILookAndFeel extends JFrame {

	private JPanel contentPane;
	private final JButton btnNewButton = new JButton("New button");

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					GUILookAndFeel frame = new GUILookAndFeel();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public GUILookAndFeel() {
		try {
		    for (LookAndFeelInfo info : UIManager.getInstalledLookAndFeels()) {
		        if ("Windows".equals(info.getName())) {
		            UIManager.setLookAndFeel(info.getClassName());
		            break;
		        }
		        //Windows, Nimbus, Metal
		    }
		} catch (Exception e) {
		    // If Nimbus is not available, you can set the GUI to another look and feel.
		}
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		contentPane.setLayout(new BorderLayout(0, 0));
		setContentPane(contentPane);
		contentPane.add(btnNewButton, BorderLayout.WEST);
		
		JRadioButton rdbtnNewRadioButton = new JRadioButton("New radio button");
		contentPane.add(rdbtnNewRadioButton, BorderLayout.CENTER);
		
		JTextArea textArea = new JTextArea();
		contentPane.add(textArea, BorderLayout.SOUTH);
		
		JLabel lblNewLabel = new JLabel("New label");
		contentPane.add(lblNewLabel, BorderLayout.NORTH);
		
		JButton btnNewButton_1 = new JButton("New button");
		contentPane.add(btnNewButton_1, BorderLayout.EAST);
	}

}
