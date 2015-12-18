public class ExceptionTry{
	public static void tp() throws ArithmeticException{
		int a;
		a =5/0;
		System.out.println("运算结果"+a);
	}
	
	public static void main(String [] args){
		int a;
		try{
			a =5/0;
			System.out.ptintln("运算结果:"+a);
		
		}catch(ArithmeticException e){
			e.printStackTrace();
		}finally{
			a = -1;
			System.out.println("运算结果"+a);
		}
		
		try{
			ExceptionTry.tp();
		}catch(Exception e){
			System.out.println("异常捕获");
		}
	}
}